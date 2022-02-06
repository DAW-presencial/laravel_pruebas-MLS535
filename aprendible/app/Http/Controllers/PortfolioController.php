<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $project = Project::get();
//
        $project = Project::where('user_id', Auth::user()->id)->get();
        return view('projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProjectRequest $request)
    {
//       $fieldvalidated = request()->validate([
//        'title'=> 'required',
//            'description' => 'required'
//        ]);
        //Nos devolverá el proyecto recien creado
//      $title =  $request->get('title');
//      $description =  $request->get('description');


        Project::create([
            'title' => $request->input('title'), //field-of-table => $request(data of form)->input('name-field');
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);


        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Project $project)
    {

//        return view('projects.show',[
//            'project' =>
//            ]);
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function edit(Project $project)
    {
        //
//        return view('projects.edit',[
//            'project' => $project
//        ]);
//        $this->authorize('update',$project);

//Nos lleva a al vista donde podemos editar el contacto
        return view('projects.edit', [
            'project' => $project
        ]);
//        return view('projects.edit',  compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, CreateProjectRequest $request)
    {
        //
//        Project::update(
//            $request->validated()
//        );
//     $project ->update([
//         $request->validated()
//
//     ]);

        //redirect()->route('projects.index')
        $project->update([
            'title' => request('title'),
            'description' => request('description')
        ]);
        return redirect()->route('projects.show', $project);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index');
    }
}
