<?php

namespace App\Http\Controllers;

use App\Http\Requests\MusicianRequest;
use App\Models\Musician;
use Illuminate\Http\Request;

class MusicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('musicos.index', [
            'musicos' => Musician::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('musicos.create', [
            'musico' => new Musician
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MusicianRequest $request)
    {
        //
        $musico = New Musician($request->validated());

        $musico->save();

        return redirect()->route('musicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Musician $musician)
    {
        //
        return view('musicos.show', [
            'musico' => $musician
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Musician $musician)
    {
        //
        return view('musicos.edit', [
            'musico' => $musician
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MusicianRequest $request, Musician $musician)
    {
        //
        $musician -> update($request ->validated());
        return redirect()->route('musicos.show', $musician);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Musician $musician)
    {
        $musician ->delete();
        return redirect()->route('musicos.index', $musician);
    }
}
