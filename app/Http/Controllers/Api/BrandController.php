<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{

    /*public function index(Request $request)
    {
        $brand = Brand::pluck('nombre','id');
        return  $brand;
    }*/ 
    public function index(Request $request)
    {
        $brand = Brand::all();
        return response()->json([
            'brands' => $brand
        ],200);
    } 

    public function brandsbyarray(Request $request)
    {
        $brands = $request->brands;
        $brands = Brand::find($brands);
        return response()->json([
            'brands' => $brands
        ],200);
    } 

    public function brand(Request $request, $slug)
    {
        $zona = Brand::where('slug','=', $slug)->orWhere('id', '=', $slug)->first();
        return  $zona;
    }

    public function showProducts(Request $request)
    {
        try{
            $brands = $request->brands;
            $pila = array();
            for($i=0; $i<count($brands); $i++){
                array_push($pila,Brand::find($brands[$i])->products);
            }   
            return $pila;
        }catch(\Exception $e){
            return $e;
        }
    }

    public function products(Request $request, $slug)
    {
        $products = Brand::where('slug','=', $slug)->orWhere('id', '=', $slug)->first();
        return  $products->products;
    }
    
}
