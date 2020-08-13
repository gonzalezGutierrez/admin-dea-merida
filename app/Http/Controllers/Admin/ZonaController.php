<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function  __construct()
    {
        $this->zona = new Zona();
    }
    public function index(Request $request){
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $zonas  = $this->zona->getZonas($status)->get();
        return view('admin.zonas.index',['zonas'=>$zonas]);
    }
    public function show($idZona){
        return $this->zona->getZonaWithId($idZona);
    }
    public function store(Request $request){
        try{
            $this->zona->add($request->all());
            alert()->success('Zona registrada correctamente', '');
            return redirect('admin/zonas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function update(Request $request, $idZona){
        try{
            $this->zona->getZonaWithId($idZona)->edit($request->all());
            alert()->success('Zona actualizada correctamente', '');
            return redirect('admin/zonas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request,$idZona){
        $zona = $this->zona->getZonaWithId($idZona);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$zona);
            $helper->optionDestroy();
            alert()->success('La zona fue dado de baja', '');
            return redirect('admin/zonas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function create()
    {
        return view('admin.zonas.create',['zona'=>$this->zona]);
    }
    public function edit($idZona)
    {
        $zona =  $this->zona->getZonaWithId($idZona);
        return view('admin.zonas.edit',['zona'=>$zona]);
    }

}
