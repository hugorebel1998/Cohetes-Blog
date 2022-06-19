<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {

        $productos = Product::all();
        return view('admin.products.index');
    }
}
