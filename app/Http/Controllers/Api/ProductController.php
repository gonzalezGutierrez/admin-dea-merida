<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::pluck('nombre','id','slug');
        return response()->json([
            'products' => $products
        ],200);
    }
}
