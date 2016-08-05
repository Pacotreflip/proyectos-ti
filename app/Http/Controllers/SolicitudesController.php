<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Solicitud\Solicitud; 
use App\Models\Proyecto\Proyecto;
use App\Http\Requests\StoreSolicitudRequest;

class SolicitudesController extends Controller
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
    public function index($id_proyecto)
    {        
        return view('solicitudes.index')
                ->with('proyecto', Proyecto::find($id_proyecto));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_proyecto)
    {
        return view('solicitudes.create')
                ->with('proyecto', Proyecto::find($id_proyecto));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitudRequest $request, $id_proyecto)
    {
        $proyecto = Proyecto::find($id_proyecto);
        $solicitud = new Solicitud();
        $solicitud->id_proyecto = $proyecto->id;
        $solicitud->fecha = $request->get('fecha');
        $solicitud->tipo = $request->get('tipo');
        $solicitud->solicitante = $request->get('solicitante');
        $solicitud->objetivo = $request->get('objetivo');
        $solicitud->descripcion = $request->get('descripcion');
        $solicitud->id_usuario = auth()->user()->idusuario;
        $solicitud->save();
                
        return redirect(route('proyecto.solicitudes.show', [$proyecto,$solicitud]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_proyecto, $id)
    {
        return view('solicitudes.show')
                ->with('proyecto', Proyecto::find($id_proyecto))
                ->with('solicitud', Solicitud::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('solicitudes.edit')
                ->with('solicitud', Solicitud::find($id));
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
        Solicitud::destroy($id);
        Flash::success('Solicitud eliminada con éxito');
        return redirect()->back();
    }
}
