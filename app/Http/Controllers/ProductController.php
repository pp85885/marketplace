<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $productQuery = Product::query();

        if (auth()->user()->role != 'admin') {
            $productQuery->myProducts();
        }

        $products = $productQuery->latest()->get();

        return view('product.index', compact('products'));
    }

    function create()
    {
        return view('product.create');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // assign product to the user
        $validated['user_id'] = auth()->user()->id;

        $validated['image'] = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('products', $fileName, 'public');

            $validated['image'] = $fileName;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product   =   Product::findOrFail(decrypt($id));
        return view('product.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request)
    {
        $validated = $request->validated();

        $product   =   Product::findOrFail(decrypt($request->id));

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('products', $fileName, 'public');

            $validated['image'] = $fileName;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product   =   Product::findOrFail(decrypt($id));

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
