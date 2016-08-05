<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreDocumentoRequest;
use App\Models\Documento\Documento;
use App\Models\Solicitud\Solicitud;

class DocumentosController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentoRequest $request, $id_solicitud)
    {   
        $solicitud = Solicitud::findOrFail($id_solicitud);
        $file = $request->file('documento');
        $extension = $file->getClientOriginalExtension();
        $directory = 'uploads/documentos/';
        $filename = sha1(time().time()).".{$extension}";
        $nombre = $file->getClientOriginalName();
        $documento = new Documento();
        $documento->nombre = $nombre;
        $documento->path = $directory . $filename;        
        $file->move($directory, $filename);

        $documento->id_solicitud = $solicitud->id;
        $documento->save();
        
        if ($request->ajax()) {
            return response()->json($documento->path);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_solicitud, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_solicitud, $id)
    {
       $documento = Documento::findOrFail($id);
        $files = in_array($documento->thumbnail_path, [
            'uploads/documentos/pdf.png',
            'uploads/documentos/doc.png',
            'uploads/documentos/xls.png'
        ]) ? [$documento->path] : [$documento->path, $documento->thumbnail_path];

        $documento->delete();
        File::delete($files);

        return back(); 
    }
}
