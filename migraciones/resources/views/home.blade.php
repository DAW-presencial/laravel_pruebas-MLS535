@include('layouts.plantilla')
<main>
    <h1 class="text-2xl text-center mt-5">Uep!
        @auth
            <span>{{ ucfirst(Auth::user()->name) }}</span>

        @endauth
    </h1>
</main>
