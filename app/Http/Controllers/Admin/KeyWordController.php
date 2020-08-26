<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeyWord;
class KeyWordController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $keyWords = KeyWord::getKeywords($status)->get();
        return view('admin.keywords.index',compact('keyWords'));
    }

    public function create()
    {
        $keyWord = new KeyWord();
        return view('admin.keywords.create',compact('keyWord'));
    }

    public function store(Request $request)
    {
        try {
            KeyWord::create($request->all());
            return redirect('/admin/palabras-claves');
        } catch (\Exception $e) {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keyWord = KeyWord::findOrFail($id);
        return view('admin.keywords.edit',compact('keyWord'));
    }

    public function update(Request $request, $id)
    {
        try {
            $keyWord = KeyWord::findOrFail($id);
            $keyWord->fill($request->all())->save();
            return redirect('/admin/palabras-claves');
        } catch (\Exception $e) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
