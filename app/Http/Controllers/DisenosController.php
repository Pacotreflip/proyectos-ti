<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as R;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Proyecto\Proyecto;
use Laracasts\Flash\Flash;
use App\Http\Requests\UpdateEtapaRequest;
use App\Models\Diseno\Diseno;

class DisenosController extends Controller
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
        
        return view('disenos.show')
                ->with('proyecto', $proyecto)
                ->with('diseno', $proyecto->diseno);
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
    public function update(UpdateEtapaRequest $request, $id_proyecto)
    {
        $proyecto = Proyecto::findOrFail($id_proyecto);
        $diseno = $proyecto->diseno;
        
        $diseno->fecha_inicio = $request->fecha_inicio;
        $diseno->fecha_fin = $request->fecha_fin;
        $diseno->id_usuario = $request->id_usuario;
        $diseno->save();

        $data = [
            'success' => 'Información de la etapa DISEÑO actualizada correctamente.'
        ];
        
        return response()->json($data);
        
        
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
