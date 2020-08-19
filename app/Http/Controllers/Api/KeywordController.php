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
}