@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a class="nav-link" >{{ __('Add Student Mark') }}</a>
                </div>

                <div class="card-body">

                    <!-- {{ __('You are logged in!') }} -->
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    {{ Form::open(array('url' => 'student')) }}
                            <div class="form-group">
                                <label for="category">Name:</label>
                                <input class="form-control" id="name" name="name" value="{{old('name')}}" />
                            </div>
                            <div class="form-group">
                                <label for="category">Subject:</label>
                                <input class="form-control" id="subject" name="subject" value="{{old('subject')}}" />
                            </div>
                            <div class="form-group">
                                <label for="category">Mark:</label>
                                <input class="form-control" id="mark" name="mark" value="{{old('mark')}}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection