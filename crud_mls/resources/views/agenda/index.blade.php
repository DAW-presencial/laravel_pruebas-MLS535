@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="showimages"></div>
        </div>
        <div class="col-md-12  mt-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h6 class="text-white">Crud Maite Ladaria</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right mb-3">
                            @can('create',$newAgenda)

                                <a href="{{ route('agenda.create') }}" class="btn btn-success">Create</a>

                            @endcan
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>@lang('Name')</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Number</th>
                            <th>Participant</th>
                            <th>Radio</th>
                            <th>Description</th>
                            <th>Email</th>
                            <th>Image</th>
                        </tr>
                        @foreach($agenda as $agendas)
                            <tr>
                                <td>{{ $agendas->name }}</td>

                                <td>

                                    @foreach($agendas->category as $value)
                                        {{$value}},
                                    @endforeach
                                </td>
                                <td>{{ $agendas->date }}</td>
                                <td>{{ $agendas->number }}</td>
                                <td>{{ $agendas->size }}</td>
                                <td>{{ $agendas->gender }}</td>
                                <td>{{ $agendas->description }}</td>
                                <td>{{ $agendas->email }}</td>
                                <td>   <img src="{{asset("image/". $agendas->image) }}" width="150px"></td>
                                <td>
                                    <form action="{{ route('agenda.destroy',$agendas) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-info" href="{{ route('agenda.show',$agendas->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('agenda.edit',$agendas->id) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--    {!! $posts->links() !!}--}}
@endsection

