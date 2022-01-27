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
        <li class="{{setActive('home') }}"><a href="/"> Home</a></li>
        <li class="{{setActive('About') }}"><a href="about"> About</a></li>
        <li class="{{setActive('portfolio') }}"><a href="/portfolio"> portfolio</a></li>
        <li class="{{setActive('contact') }}"><a href="/contact"> contact</a></li>
    </ul>
</nav>
@yield('content')

</body>
</html>
