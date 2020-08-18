<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Models\Chain;
use App\Models\Group;
use App\Models\Store;
use App\Models\Zona;
use Illuminate\Http\Request;
use App\Http\Requests\TiendaRequest;


class StoreController extends Controller
{
    public function __construct()
    {
        $this->store = new Store();
    }
    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $stores = $this->store->getStores($status)->get();
        return view('admin.stores.index',['stores'=>$stores]);
    }
    public function store(TiendaRequest $request)
    {
        try {
            $this->store->add($request->all());
            alert()->success('Tienda registrada correctamente', '');
            return redirect('admin/tiendas');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $idStore)
    {
        try {
            $store = $this->store->getStoreWithId($idStore);
            $store->edit($request->all());
            alert()->success('Tienda actualizada correctamente', '');
            return redirect('admin/tiendas');
        }catch (\Exception $e){
            alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request,$idStore)
    {
        $store = $this->store->getStoreWithId($idStore);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$store);
            $helper->optionDestroy();
            alert()->success('La tienda fue dada de baja exitosamente', '');
            return redirect('admin/tiendas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function edit($idStore)
    {
        $store = $this->store->getStoreWithId($idStore);
        $chains = Chain::pluck('nombre','id');
        $zonas = Zona::pluck('nombre','id');
        return view('admin.stores.edit',['store'=>$store,'chains'=>$chains,'zonas'=>$zonas]);
    }
    public function create()
    {
        $chains = Chain::pluck('nombre','id');
        $zonas = Zona::pluck('nombre','id');
        return view('admin.stores.create',['store'=>$this->store,'chains'=>$chains,'zonas'=>$zonas]);
    }
}
