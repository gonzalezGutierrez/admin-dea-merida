<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GrupoController extends Controller
{

    public function index()
    {
        $grupos = Group::getGroups('activo')->get();
        return response()->json(['data'=>$grupos],200);
    }
}
