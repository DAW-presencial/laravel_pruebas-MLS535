@section('title')
    Contact
@endsection


@extends('layout')

@section('content')

    <h1>Contact</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    <form method="post" action="{{route('contact')}}">
        @csrf
        <input type="text" name="nombre"  placeholder="Nombre">
        <input type="email" name="email"  placeholder="email">
        <input type="text" name="asunto"  placeholder="asunto">
        <textarea placeholder="Mensaje"></textarea>
        <input type="submit">
    </form>
@endsection
