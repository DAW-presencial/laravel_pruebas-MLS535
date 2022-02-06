@include('layouts.plantilla')
<main>
    <h2 class="text-xl">Editar la información de contacto de
        {{$agenda->name}}</h2>
    <form class="ml-5 mt-5" method="POST" enctype="multipart/formdata"
          action="{{ route('agenda.update', $agenda) }}">
        @csrf
        @method('PUT')
        <label for="name"> Contact name:
            <input class="border-2 border-solid border-gray-100
rounded-full px-2" type="text" name="name" value="{{old('name',$agenda->name)}}" placeholder="Bernat Smith"/>
        </label>
        Este archivo contiene un formulario para poder editar un contacto existente.
        show
        @error('name')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
        <br>
        <label for="email"> Contact email:
            <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="text" name="email" value="{{old('email',$agenda->email)}}" placeholder="bernat@email.com"/>
        </label><br>
        <label for="phone"> Contact phone:
            <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="text" name="phone" value="{{old('phone',$agenda->phone)}}" placeholder="654321234"/>
        </label>
        @error('phone')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
        <br>
        <label for="address"> Contact address:
            <input class="border-2 border-solid border-gray-100
rounded-full px-2" type="text" name="address" value="{{old('address', $agenda->address)}}" placeholder="Address 123, street"/>
        </label><br>
        <button class="text-orange-400 no-underline border-solid
border-2 border-orange-400 rounded p-1 px-5 ml-5 mt-5 hover:bgorange-400 hover:text-white" type="submit" name="add">
            #
            Edit</button>
    </form>
</main>
