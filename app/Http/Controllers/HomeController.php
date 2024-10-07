<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::latest()->get();
        return view('index', compact('products'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout successfully');
    }
}
