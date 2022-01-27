@section('title')
    Portfolio
@endsection

@extends('layout')

@section('content')

    <h1>Portfolio</h1>


    <ul>
         @forelse ($portfolio as $portfolioItem)
        <li>{{  $portfolioItem['title']}} <pre>{{var_dump($loop->last ? 'es el último' : '')}}</pre></li>

        @empty
            <li>No hay proyectos para mostrar</li>
        @endforelse




</ul>
@endsection
