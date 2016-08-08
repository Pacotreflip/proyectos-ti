<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as R;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ghi\Core\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
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
    public function index(Request $request)
    {
        if(R::ajax()){
            $busqueda = $request->get('q');
            $users = User::select(DB::raw("CONCAT(nombre, ' ', apaterno, ' ', amaterno) AS full_name, idusuario"))
                    ->whereRaw("CONCAT(nombre, ' ', apaterno, ' ', amaterno) LIKE '%$busqueda%'");
           
            $data = [];
            if($request->get('type') == 'autocomplete') {
                $data = $users->lists('full_name');
            }
            if($request->get('type') == 'select2') {
                $users = $users->lists('full_name', 'idusuario');
                $data = [];
                foreach($users as  $id => $user) {
                    $data[] = ['id' => $id, 'text' => $user];
                } 
            }
        }
             
        return response()->json($data);
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
        //
    }
}
