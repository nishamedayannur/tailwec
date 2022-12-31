@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a class="nav-link" href="{{ url('blog') }}">{{ __('Add New Blog') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- {{ __('You are logged in!') }} -->
                    <table class="table">
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
                       <td>{{$student->name}}</td>
                       <td>{{$student->subject}}</td>
                       <td>{{$student->mark}}</td>
                       <td>
                            <<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#demoModal">Click Here</button>
                            <a class="nav-link" href="{{ url('blog-delete',[$student->id]) }}">{{ __('Delete') }}</a>
                        </td>
                     </tr>
                     <!-- Modal Example Start-->
                        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Modal Example - Websolutionstuff</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                            Welcome, Websolutionstuff !!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
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
@endsection