<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productImage;
use Illuminate\Support\Facades\Storage;



class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->productImage = new ProductImage();
    }
    
    public function store(Request $request)
    {
        try {
            if($request->hasFile('url')){
                $datosDeLaImagen['url']=$request->file('url')->store('uplodad','public');
                
                $request->url = $datosDeLaImagen['url'];
                // return $request->url;
            }
            
            productImage::create(['product_id'=> $request->product_id , 'url'=> $datosDeLaImagen['url'],'cover_page'=> $request->cover_page]);
            // $this->productImage->add($request->all());
            // alert()->success('marca registrada correctamente', '');
            // return redirect('admin/marcas');

            return response()->json([
                'message' => 'Imagen almacenada.'
            ],200);

        }catch (\Exception $e){
            // alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            // return back();
            return response()->json([
                'error' => $e
            ],404);
        }
    }


    public function delete(Request $request, $id)
    {
        $productImage = productImage::find($id);
        $a = "/app/public/".$productImage->url;
        if( unlink(storage_path().$a)){
            $productImage->delete();
            echo "File exist";
        }else{
            echo "File does not exist";
        }
    }   
}
