
@extends('layout')
@section('title', 'Crear proyecto')

@section('content')

    <h1>Portfolio</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    @endif
<h1>Editar proyecto</h1>

    <form method="post" action="{{route("projects.update", $project)}}">
        @csrf @method('PATCH')

        <label>
            Titulo del proyecto <br>
            <input type="text" name="title" value="{{old('title', $project->title)}}">
            {!! $errors->firts('name', '<small>:message</small><br>') !!}
        </label>
        <br>
        <label>
            descripcion del proyecto <br>
            <textarea type="text" name="description">{{old('description', $project->description)}} </textarea>
            {!! $errors->firts('name', '<small>:message</small><br>') !!}
        </label>
        <br>
        <button>Actualizar proyecto</button>
    </form>

@endsection
