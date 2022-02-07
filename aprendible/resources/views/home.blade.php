@section('title', 'home')

@extends('layout')

@section('content')

    <h1>Aquí se añade todo el contenido que queramos</h1>

    <form action="{{ route('register') }}" method="get">
        @csrf
        <input type="submit" name="Register" value="Register"/>


    </form>
    <form action="{{ route('login') }}" method="get">
        @csrf
        <input type="submit" name="login" value="Log in"/>
    </form>


    @endsection

