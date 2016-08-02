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
            $proyecto->nombre = $request->nombre;
            $proyecto->fecha_inicio = $request->fecha_inicio;
            $proyecto->fecha_fin = $request->fecha_fin;
            $proyecto->descripcion = $request->descripcion;
            $proyecto->objetivo = $request->objetivo;
            $proyecto->id_usuario = auth()->user()->idusuario;
            $proyecto->save();

            $solicitud = New Solicitud();
            $solicitud->id_proyecto = $proyecto->id;
            $solicitud->fecha = $request->fecha_solicitud;
            $solicitud->tipo = 1;
            $solicitud->solicitante = $request->solicitante;
            $solicitud->objetivo = $request->objetivo;
            $solicitud->descripcion = $request->descripcion;
            $solicitud->id_usuario = auth()->user()->idusuario;
            $solicitud->save();
            
            DB::connection('proyectos_ti')->commit();
            
        } catch (Exception $ex) {
            DB::connection('proyectos_ti')->rollBack();
            throw $ex;
        }       
        
        return redirect(route('proyectos.solicitudes.show', [$proyecto, $solicitud]));
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
