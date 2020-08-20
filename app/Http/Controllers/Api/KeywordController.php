<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keyword;
use App\Http\Requests\KeywordRequest;


class KeywordController extends Controller
{
    public function __construct()
    {
        $this->keyword = new  Keyword();
    }
    
    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $keywords = $this->keyword->getKeywords($status)->get();
        return ["keywords"=>$keywords];
    }

    public function store(KeywordRequest $request){

        try{
            $request['estatus'] = 'activo';
            $this->keyword->add($request->all());
            return response()->json(['msg'=>'Fuiste registrado correctamente']);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function update(KeywordRequest $request, $id)
    {
        try {
            $kw = Keyword::find($id);
            $kw->nombre =$request->nombre;
            $kw->save();
            return response()->json([
                'message' => 'Keyword actualizada.'
            ],200);
            // alert()->success('La cadena fue actualizada correctamente', '');
            // return redirect('admin/cadenas');
        }catch (\Exception $e){
            return response()->json([
                'error' => $e
            ],200);
        }
    }


    public function setInactive(Request $request, $id)
    {
        try {
            $kw = Keyword::find($id);
            $kw->estatus ="inactivo";
            $kw->save();
            return response()->json([
                'message' => 'Keyword inactiva.'
            ],200);
            // alert()->success('La cadena fue actualizada correctamente', '');
            // return redirect('admin/cadenas');
        }catch (\Exception $e){
            return response()->json([
                'error' => $e
            ],200);
        }
    }

}