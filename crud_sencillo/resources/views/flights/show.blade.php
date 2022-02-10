
@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('flights.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('flights.edit',$flight) }}">Edit</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Number</th>
                    <th>Participant</th>
                    <th>Radio</th>
                    <th>Description</th>
                </tr>

                <tr>
                    <td>{{ $flight->name }}</td>
                    <td>{{ $flight->date }}</td>
                    <td>{{ $flight->number }}</td>
                    <td>{{ $flight->size }}</td>
                    <td>{{ $flight->gender }}</td>
                    <td>{{ $flight->description }}</td>

                </tr>

            </table>
        </div>
    </div>

@endsection
