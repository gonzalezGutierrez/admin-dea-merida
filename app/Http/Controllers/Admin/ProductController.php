<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

class ProductController extends Controller
{
   public function __construct()
   {
       $this->product = new Product();
   }

    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $products = $this->product->getProducts($status)->get();
        return view('admin.products.index',['products'=>$products]);
    }
    public function store(ProductoRequest $request)
    {
        try {
            $this->product->add($request->all());
            alert()->success('Producto registrado correctamente', '');
            return redirect('admin/productos');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $idProduct)
    {
        try {
            $product = $this->product->getProductWithId($idProduct);
            $product->edit($request->all());
            alert()->success('Producto actualizado correctamente', '');
            return redirect('admin/productos');
        }catch (\Exception $e){
            alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request,$idProduct)
    {
        $product = $this->product->getProductWithId($idProduct);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$product);
            $helper->optionDestroy();
            alert()->success('El producto fue dado de baja exitosamente', '');
            return redirect('admin/productos');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function edit($idProduct)
    {
        $product = $this->product->getProductWithId($idProduct);
        $brands = Brand::pluck('nombre','id');
        return view('admin.products.edit',['product'=>$product,'brands'=>$brands]);
    }
    public function create()
    {
        $brands = Brand::pluck('nombre','id');
        return view('admin.products.create',['product'=>$this->product,'brands'=>$brands]);
    }
}
