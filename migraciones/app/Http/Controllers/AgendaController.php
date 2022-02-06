<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgenda;
use App\Models\Agenda;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        $this->authorize('viewAny', Agenda::class);
        $contacts = Agenda::where('user_id', Auth::id())->latest()->paginate(5);
return view('agenda.index', compact('contacts'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize('create', Agenda::class);
        return view('agenda.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAgenda $request
     * @return RedirectResponse
     */
    public function store(StoreAgenda $request): RedirectResponse
    {
        Agenda::create($request->all());
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
        $this->authorize('view', $agenda);
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Agenda $contact
     * @return Application|Factory|View
     */
    public function edit(Agenda $agenda)
    {
        $this->authorize('update', $agenda);
        return view('agenda.edit', compact('agenda'));
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Agenda $contact
     * @return RedirectResponse
     */
    public function update(StoreAgenda $request, Agenda $agenda):
    RedirectResponse
    {
        $this->authorize('update', $agenda);
        $agenda->update($request->all());
        return redirect()->route('agenda.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Agenda $contact
     * @return RedirectResponse
     */
    public function destroy(Agenda $agenda): RedirectResponse
    {
        $this->authorize('delete', $agenda);
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}
