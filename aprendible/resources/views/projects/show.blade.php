
@extends('layout')

@section('title', $project->title)

@section('content')

    <a href="{{route('projects.edit', $project)}}">Editar proyecto</a><br>

    <form method="POST" action="{{route('projects.destroy', $project)}}">
        @csrf @method('DELETE')
        <button>Eliminar</button>
    </form>
{{$project->title}}
<br>
{{$project->description}}
@endsection
