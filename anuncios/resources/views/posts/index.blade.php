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


                            <a href="{{ route('posts.create') }}" class="btn btn-success">Create</a>


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
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>

                                <td>

                                    @foreach($post->category as $value)
                                        {{$value}},
                                    @endforeach
                                </td>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->number }}</td>
                                <td>{{ $post->size }}</td>
                                <td>{{ $post->gender }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->email }}</td>
                                <td>   <img src="{{asset("image/". $post->image) }}" width="150px"></td>
                                <td>
                                    <form action="{{ route('posts.destroy',$post) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
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
