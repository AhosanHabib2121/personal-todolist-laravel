@extends('layouts.dashboard_master')

@section('dashboard_title')
    Create Todo
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    <h2>Create Todo</h2>
                </div>
                <div class="card-body">
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form action="{{route('todo-list.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="text-black">Task</label>
                          <input type="text" name="task" class="form-control @error('task') is-invalid @enderror " aria-describedby="emailHelp">
                          @error('task')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

