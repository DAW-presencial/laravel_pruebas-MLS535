@extends('layout')
@section('title', 'Portfolio')

@section('content')

    <h1>Portfolio</h1>

    <a href="{{route('projects.create')}}">Crear un proyecto</a>
    <ul>
        @forelse ($project as $projects)
            <li><a href="{{route('projects.show', $projects)}}">{{  $projects->title}} </a></li>
            {{--         <p>{{$portfolioItem->description}}</p><br>--}}
            {{--            <p>{{$portfolioItem->created_at}}</p>--}}
        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse
        <span>Aquí obtenemos el usuario que se ha logueado</span>
            @auth()
            <p>{{auth()->user()->name}}</p>
            @endauth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" name="logout" value="Log out"/>
            </form>


    </ul>
@endsection
