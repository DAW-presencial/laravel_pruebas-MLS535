<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MusicianRequest;
use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Musician[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Musician::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MusicianRequest $request)
    {
        //
        Musician::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Musico guardado correctamente'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function show(Musician $musician)
    {
        //
        return response()->json([
            'musician' => $musician
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function update(MusicianRequest $request, Musician $musician)
    {
        //
        $musician -> update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Musico actualizado correctamente'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musician  $musician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musician $musician)
    {
        //
        $musician->delete();
        return response()->json([
            'res' => true,
            'mensaje' => 'Paciente Borrado correctamente'
        ]);

    }
}
