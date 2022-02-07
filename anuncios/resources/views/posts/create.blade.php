    @extends('layouts.layout')
    @section('content')
        @auth()
            <p>{{auth()->user()->id}}</p>
        @endauth
    <div class="row">
        <div class="col-md-12">
            <div id="showimages"></div>
        </div>
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h6 class="text-white">{{__('Create')}}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right mb-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">@lang('Back')</a>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> @lang("There were some problems with your input.")<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
{{--                        Name type:text--}}
                        <div class="form-group">
                            <label><strong>@lang("Name") :</strong></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                            {!! $errors->first('name','<small>:message</small><br>') !!}
                        </div>

{{--                        Category type:checkbox--}}
                        <div class="form-group">
                            <label><strong>{{__("Category")}} :</strong></label><br>
                            <label><input type="checkbox" name="category[]" value="Laravel"> Laravel</label>
                            <label><input type="checkbox" name="category[]" value="JQuery"> JQuery</label>
                            <label><input type="checkbox" name="category[]" value="Bootstrap"> Bootstrap</label>
                            <label><input type="checkbox" name="category[]" value="Codeigniter"> Codeigniter</label>
                            <label><input type="checkbox" name="category[]" value="JQuery UI"> JQuery UI</label>
                            {!! $errors->first('category','<small>:message</small><br>') !!}
                        </div>
{{--                        date type:date--}}
                        <div class="form-group">
                            <label><strong>@lang("Date") :</strong></label><br>
                            <input type="date" name="date" class="form-control"  value="{{old('date')}}"/>
                            {!! $errors->first('date','<small>:message</small><br>') !!}
                        </div>
{{--number type:number--}}
                        <div class="form-group">
                            <label><strong>@lang("Number or hours done") :</strong></label><br>
                            <input type="number" name="number" class="form-control"  value="{{old('number')}}"/>
                            {!! $errors->first('number','<small>:message</small><br>') !!}
                        </div>
{{--type:select name size--}}
                        <div class="form-group">
                            <label>@lang("Participant")</label>
                            <select class="form-control" name="size">
                                <option selected>Pick Size</option>
                                <option value="2" @if(old('size') === '2') selected @endif>2</option>
                                <option value="4" @if(old('size') === '4') selected @endif>4</option>
                                <option value="8" @if(old('size') === '8') selected @endif>8</option>
                            </select>
                            {!! $errors->first('size','<small>:message</small><br>') !!}
                        </div>

{{--                        type:radio--}}

                        <div class="form-group">
                            <label><strong>@lang("Gender") :</strong></label><br>
                            <label>
                                <input type="radio" name="gender" class="form-control" value="Female" checked/>Female</label>
                            <label> <input type="radio" name="gender" class="form-control" value="Male"/>Male</label>
                            {!! $errors->first('gender','<small>:message</small><br>') !!}
                        </div>

{{--                        type:textarea--}}
                        <div class="form-group">
                            <label><strong>Description :</strong></label>
                            <textarea class="form-control" rows="4" cols="40" name="description">{{old('description')}}</textarea>
                            {!! $errors->first('description','<small>:message</small><br>') !!}
                        </div>

{{--  email--}}
                        <div class="form-group">
                            <label><strong>@lang("Email") :</strong></label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}"/>
                        </div>

                        <div class="form-group custom-file">
                            <label class="custom-file-label" id="customFile">@lang("Choose File")</label>
                            <input name="image" type="file" class="custom-file-input" id="customFile">
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <p></p>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-sm">@lang("Save")</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

