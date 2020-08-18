<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{

    public function index(Request $request)
    {
        $brand = Brand::pluck('nombre','id');
        return  $brand;
    } 

    public function brand(Request $request, $slug)
    {
        $zona = Brand::where('slug','=', $slug)->orWhere('id', '=', $slug)->first();
        return  $zona;
    }

    public function products(Request $request, $slug)
    {
        $products = Brand::where('slug','=', $slug)->orWhere('id', '=', $slug)->first();
        return  $products->products;
    }
    
}
