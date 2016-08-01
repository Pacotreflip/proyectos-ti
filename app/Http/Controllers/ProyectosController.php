<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Solicitud;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreProyectoRequest;

class ProyectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('proyectos.index')
                ->with('proyectos', Proyecto::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectoRequest $request)
    {
        try {
            DB::connection('proyectos_ti')->beginTransaction();
            
            $proyecto = New Proyecto();
            $proyecto->nombre = $request->get('nombre');
            $proyecto->fecha_inicio = $request->get('fecha_inicio');
            $proyecto->fecha_fin = $request->get('fecha_fin');
            $proyecto->descripcion = $request->get('descripcion');
            $proyecto->objetivo = $request->get('objetivo');
            $proyecto->save();

            $solicitud = New Solicitud();
            $solicitud->id_proyecto = $proyecto->id;
            $solicitud->fecha = $request->get('fecha_solicitud');
            $solicitud->tipo = 1;
            $solicitud->solicitante = $request->get('solicitante');
            $solicitud->objetivo = $request->get('objetivo');
            $solicitud->descripcion = $request->get('descripcion');
            $solicitud->save();
            
            DB::connection('proyectos_ti')->commit();
            
        } catch (Exception $ex) {
            DB::connection('proyectos_ti')->rollBack();
            throw $ex;
        }       
        
        return redirect(route('proyecto.show', $proyecto));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('proyectos.show')
                ->with('proyecto', Proyecto::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('proyectos.edit')
                ->with('proyecto', Proyecto::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::destroy($id);
        Flash::success('Proyecto eliminado con éxito');
        return redirect()->back();
    }
}
