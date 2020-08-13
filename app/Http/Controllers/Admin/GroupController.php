<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Config\Helper;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Zona;
use App\Models\ZonaGrupo;
use Illuminate\Http\Request;
use DB;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->group = new Group();
    }
    public function index(Request $request)
    {
        $status = $request->estatus == null ? 'activo' : $request->estatus;
        $groups = $this->group->getGroups($status)->get();
        return view('admin.groups.index',['groups'=>$groups]);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $zonas = $request->zona;
            $group = $this->group->add($request->all());
            for($i = 0; $i<count($zonas); $i++){
                $zonaG = new ZonaGrupo();
                $zonaG->grupo_id = $group->id;
                $zonaG->zona_id = $zonas[$i];
                $zonaG->save();
            }
            DB::commit();
            alert()->success('Grupo registrado correctamente', '');
            return redirect('/admin/grupos');
        }catch(\Exception $e){
            DB::rollback();
            alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function update(Request $request, $idGroup)
    {
        try {
            $this->group->getGroupWithId($idGroup)->edit($request->all());
            alert()->success('Grupo actualizado correctamente', '');
            return redirect('/admin/grupos');
        }catch(\Exception $e){
            alert()->error('Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function destroy(Request $request, $idGroup)
    {
        $group = $this->group->getGroupWithId($idGroup);
        try{
            $helper = new Helper($request->DESTROY_ACTION,$group);
            $helper->optionDestroy();
            alert()->success('El grupo fue dado de baja exitosamente', '');
            return redirect('admin/grupos');
        }catch(\Exception $e){
            alert()->error($e->getMessage(),'Ha ocurrido un error en el servidor')->persistent('Close');
            return back();
        }
    }
    public function create()
    {
        $zona = new Zona();
        return view('admin.groups.create',['group'=>$this->group,'zonas'=>$zona->getZonas('activo')->get()]);
    }
    public function edit($idGroup)
    {
        $group = $this->group->getGroupWithId($idGroup);
        $zonas = $group->zonas()->get();
        return view('admin.groups.edit',['group'=>$group,'zonas'=>$zonas]);
    }
}
