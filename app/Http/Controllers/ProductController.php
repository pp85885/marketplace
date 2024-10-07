<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products  =   Product::myProducts()->latest()->get();
        return view('product.index', compact('products'));
    }

    function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'file' => 'required|image|mimes:png,jpg,gif,jpeg|max:2024',
        ]);

        // assign the product to the user
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

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string',
            'title' => 'required|string|max:50',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'file' => 'nullable|image|mimes:png,jpg,gif,jpeg|max:2024'
        ]);

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
