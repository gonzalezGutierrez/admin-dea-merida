<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcaRequest;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->brand = new Brand();
    }

    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $brands = $this->brand->getBrands($status)->get();
        return view('admin.brands.index',['brands'=>$brands]);
    }
    public function store(MarcaRequest $request)
    {
        try {
            $request['slug'] = strtolower(Str::slug($request->nombre,'-'));
            $this->brand->add($request->all());
            alert()->success('marca registrada correctamente', '');
            return redirect('admin/marcas');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $idBrand)
    {
        try {
            $brand = $this->brand->getBrandWithId($idBrand);
            $brand->edit($request->all());
            alert()->success('Marca actualizada correctamente', '');
            return redirect('admin/marcas');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request,$idBrand)
    {
        $brand = $this->brand->getBrandWithId($idBrand);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$brand);
            $helper->optionDestroy();
            alert()->success('La marca fue dada de baja exitosamente', '');
            return redirect('admin/marcas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function edit($idBrand)
    {
        $brand = $this->brand->getBrandWithId($idBrand);
        return view('admin.brands.edit',['brand'=>$brand]);
    }
    public function create()
    {
        return view('admin.brands.create',['brand'=>$this->brand]);
    }
}
