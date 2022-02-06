
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


<form method="post" action="{{route("projects.store")}}">
    @csrf
    Titulo del proyecto <br>
    <input type="text" name="title" value="{{old('title')}}">
    </label>
    <br>
    <label>
        descripcion del proyecto <br>
        <textarea type="text" name="description">{{old('description')}} </textarea>
    </label>

    <br>
    <button>Guardar proyecto</button>
</form>

@endsection
