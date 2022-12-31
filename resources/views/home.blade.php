@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a class="nav-link" href="{{ url('student') }}">{{ __('Add New Student') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <table class="table" id="example">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Mark</th>
                        <th>Action</th>
                    </tr></thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->Name}}</td>
                        <td>{{$student->Subject}}</td>
                        <td>{{$student->Mark}}</td>
                        <td>
                            <a href data-toggle="modal" data-target="#demoModal{{$student->id}}">Edit</a>
                            <a class="nav-link" href="{{ url('delete-student',[$student->id]) }}">{{ __('Delete') }}</a>
                        </td>
                        </tr>
                        <!-- Modal Example Start-->
                            <div class="modal fade" id="demoModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="demoModalLabel">Modal Example - Websolutionstuff</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                        {{ Form::open(array('url' => 'update-student/'.$student->id)) }}
                                            <div class="form-group">
                                                <label for="category">Name:</label>
                                                <input class="form-control" id="name" name="name" value="{{$student->Name}}" />
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Subject:</label>
                                                <input class="form-control" id="subject" name="subject" value="{{$student->Subject}}" />
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Mark:</label>
                                                <input class="form-control" id="mark" name="mark" value="{{$student->Mark}}" />
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                        <!-- Modal Example End-->
                        @endforeach
                    </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endsection
