<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
       $agenda = Agenda::where('user_id', Auth::id())->get();
        return view('agenda.index', compact('agenda'),['newAgenda'=> new Agenda]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
//       if (Gate::allows('create-post')){
//           return view('posts.create');
//       } ;
//         abort(403);
        //$this->authorize('create-post');

        $this->authorize('create', new Agenda);

        return view('agenda.create');

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
        //ELOQUENT FORM


        $agenda = $request->all();
        $agenda['user_id'] = $request->user()->id;
        $agenda['category'] = $request->input('category');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $agenda['image'] = "$profileImage";
        } else {
            unset($agenda['image']);
        }

        Agenda::create($agenda);


//        $input = $request->input('size');


        return redirect()->route('agenda.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
        return view('agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, Agenda $agenda)
    {
        //
        $input = $request->validated();

        $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $agenda->update($input);
        //$post->update( $request->all());

        return redirect()->route('agenda.index')
            ->with('success', 'El usuario se ha registrado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
        $agenda->delete();

        return redirect()->route('agenda.index');

    }
}
