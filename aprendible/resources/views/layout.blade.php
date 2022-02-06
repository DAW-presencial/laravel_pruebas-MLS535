<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'titulo por parametro si no definimos')</title>
</head>
<style>
    .active{
        color: red;
        text-decoration: none;
    }
</style>
<body>

<nav>

    <ul>
        <li class="{{setActive('home') }}"><a href="{{route('home')}}"> Home</a></li>
        <li class="{{setActive('About') }}"><a href="{{route('about')}}"> About</a></li>
        <li class="{{setActive('projects.index') }}"><a href="{{route('projects.index')}}"> portfolio</a></li>
        <li class="{{setActive('contact') }}"><a href="{{route('contact')}}"> contact</a></li>
        @guest()
        <li class="{{setActive('contact') }}"><a href="{{route('login')}}"> login</a></li>
            @endguest()
    </ul>
</nav>
@yield('content')

</body>
</html>
