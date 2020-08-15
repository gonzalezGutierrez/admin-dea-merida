<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function products(Request $request, $slug)
    {
        $zona = Brand::where('slug','=', $slug)->orWhere('id', '=', $slug)->first();
        return  $zona;
    }
}
