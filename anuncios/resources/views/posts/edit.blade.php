

@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="showimages"></div>
        </div>
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h6 class="text-white">How To Store Multiple Checkbox Value In Database using Laravel - HackTheStuff</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right mb-3">
                            <a href="{{ route('posts.index', $post) }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    <form method="post" action="{{ route('posts.update', $post)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label><strong>Name :</strong></label>
                            <input type="text" name="name" class="form-control"  value="{{old($post->name)  }}"/>
                        </div>
                        <div class="form-group">
                            <label><strong>Category :</strong></label><br>
                            <label><input type="checkbox" name="category[]" value="Laravel"> Laravel</label>
                            <label><input type="checkbox" name="category[]" value="JQuery"> JQuery</label>
                            <label><input type="checkbox" name="category[]" value="Bootstrap"> Bootstrap</label>
                            <label><input type="checkbox" name="category[]" value="Codeigniter"> Codeigniter</label>
                            <label><input type="checkbox" name="category[]" value="JQuery UI"> JQuery UI</label>
                        </div>
                        <div class="form-group">
                            <label><strong>Date :</strong></label><br>
                            <input type="date" name="date" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label><strong>Numero de horas realizadas :</strong></label><br>
                            <input type="number" name="number" class="form-control" value="{{old($post->number)}}"/>
                        </div>

                        <div class="form-group">
                            <label>Participant</label>
                            <select class="form-control" name="size">
                                <option selected>Pick Size</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="8">8</option>
                            </select>
                            <small class="form-text text-muted">Your tournament size</small>
                        </div>

                        <div class="form-group">
                            <label><strong>Radio boton:</strong></label><br>
                            <label>
                                <input type="radio" name="gender" class="form-control" value="Female" checked/>Female</label>
                            <label> <input type="radio" name="gender" class="form-control" value="Male"/>Male</label>
                        </div>

                        <div class="form-group">
                            <label><strong>Description :</strong></label>
                            <textarea class="form-control" rows="4" cols="40" name="description">{{old($post->description)}}</textarea>
                        </div>

                        <div class="form-group">
                            <label><strong>Email :</strong></label>
                            <input type="email" name="email" class="form-control" value="{{old($post->email)}}"/>
                        </div>

                        <div class="form-group custom-file">
                            <label class="custom-file-label" id="customFile">Choose File</label>
                            <input name="image" type="file" class="custom-file-input" id="customFile">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <p></p>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


