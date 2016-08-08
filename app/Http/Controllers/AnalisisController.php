<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Proyecto\Proyecto;
use Laracasts\Flash\Flash;
use App\Http\Requests\UpdateEtapaRequest;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_proyecto)
    {
        $proyecto = Proyecto::findOrFail($id_proyecto);
        if(is_null($proyecto->analisis->fecha_inicio ) || is_null($proyecto->analisis->fecha_inicio )) {
            Flash::warning('Por favor establezca las fechas de inicio y fin estimadas para cada etapa del proyecto, así como los responsables de cada etapa');
            return redirect()->route('proyecto.etapas.edit', $proyecto);
        }
        return view('analisis.show')
                ->with('proyecto', $proyecto)
                ->with('analisis', $proyecto->analisis);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtapaRequest $request, $id)
    {
        $analisis = \App\Models\Analisis\Analisis::findOrFail($id);
        $analisis->fecha_inicio = $request->fecha_inicio;
        $analisis->fecha_fin = $request->fecha_fin;
        $analisis->id_usuario = $request->id_usuario;
        $analisis->save();
        
        Flash::success('Información de la etapa ANÁLISIS actualizada correctamente.');
        return redirect()->back();
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
