@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agenda.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('agenda.edit',$agenda) }}">Edit</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Number</th>
                    <th>Participant</th>
                    <th>Radio</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Image</th>
                </tr>

                <tr>
                    <td>{{ $agenda->name }}</td>

                    <td>
                        @foreach($agenda->category as $value)
                            {{$value}},
                        @endforeach
                    </td>
                    <td>{{ $agenda->date }}</td>
                    <td>{{ $agenda->number }}</td>
                    <td>{{ $agenda->size }}</td>
                    <td>{{ $agenda->gender }}</td>
                    <td>{{ $agenda->description }}</td>
                    <td>{{ $agenda->email }}</td>
                    <td>  <img src="{{asset("image/". $agenda->image) }}" width="150px" alt="image show"></td>
                </tr>

            </table>
        </div>
    </div>

@endsection
