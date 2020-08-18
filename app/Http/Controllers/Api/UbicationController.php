<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ubication;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Requests\UbicacionRequest;


class UbicationController extends Controller
{
    public function __construct()
    {
        $this->ubication = new Ubication();
    }
 
     public function store(UbicacionRequest $request)
     {
         try {
             $this->ubication->add($request->all());
             return response()->json([
                'message' => 'Ubicación creado.'
            ],200);
         }catch (\Exception $e){
            return response()->json([
                'message' => $e
            ],404);
        }
     }
     public function show($id)
     {
        try {
            $ubication = Ubication::find($id);
            return response()->json([
               'Ubication' => $ubication
           ],200);
        }catch (\Exception $e){
           return response()->json([
               'message' => 'Ha ocurrido un error en el servidor'
           ],404);
        }
     }
     public function update(Request $request, $idUbication)
     {
         try {
             $ubication = Ubication::find($idUbication);
             $ubication->edit($request->all());
            return response()->json([
                'message' => 'Ubication actualizado correctamente.'
            ],200);

            //  alert()->success('Producto actualizado correctamente', '');
            //  return redirect('admin/productos');

         }catch (\Exception $e){

            return response()->json([
                'message' => 'Ha ocurrido un error en el servidor'
            ],404);

            //  alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            //  return back();

         }
     }
     public function destroy(Request $request,$idUbication)
     {
        //  $product = $this->product->getProductWithId($idProduct)
         try{
             if(Ubication::destroy($idUbication)){
                return response()->json([
                    'message' => 'Ubication eliminado correctamente.'
                ],200);
             }
         }catch(\Exception $e){
            return response()->json([
                'message' => 'Ha ocurrido un error en el servidor'
            ],404);
            //  alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            //  return back();
         }
     }
   
}


