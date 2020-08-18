<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadenasRequest;

use App\Models\Chain;
use Illuminate\Http\Request;

class ChainStoreController extends Controller
{
    public function __construct()
    {
        $this->chain = new Chain();
    }

    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $chains = $this->chain->getChains($status)->get();
        return view('admin.chains.index',['chains'=>$chains]);
    }
    public function store(CadenasRequest $request)
    {
        try {
            $this->chain->add($request->all());
            alert()->success('La cadena fue registrada correctamente', '');
            return redirect('admin/cadenas');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $idChain)
    {
        try {
            $chain = $this->chain->getChainWithId($idChain);
            $chain->edit($request->all());
            alert()->success('La cadena fue actualizada correctamente', '');
            return redirect('admin/cadenas');
        }catch (\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request,$idChain)
    {
        $chain = $this->chain->getChainWithId($idChain);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$chain);
            $helper->optionDestroy();
            alert()->success('La cadena fue dada de baja exitosamente', '');
            return redirect('admin/cadenas');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function edit($idChain)
    {
        $chain = $this->chain->getChainWithId($idChain);
        return view('admin.chains.edit',['chain'=>$chain]);
    }
    public function create()
    {
        return view('admin.chains.create',['chain'=>$this->chain]);
    }
}
