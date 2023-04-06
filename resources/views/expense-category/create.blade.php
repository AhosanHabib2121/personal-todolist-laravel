@extends('layouts.dashboard_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center">
                    <h2>Create Expense Category Name</h2>
                </div>
                <div class="card-body">
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{session('success_message')}}
                        </div>
                    @endif
                    <form action="{{route('expense.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Category name</label>
                                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror " aria-describedby="emailHelp">
                                    @error('category_name')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Amounte</label>
                                    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror " aria-describedby="emailHelp">
                                    @error('amount')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Purpose</label>
                                    <input type="text" name="purpose" class="form-control @error('purpose') is-invalid @enderror " aria-describedby="emailHelp">
                                    @error('purpose')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>When</label>
                                    <input type="datetime-local" name="when" class="form-control @error('when') is-invalid @enderror " aria-describedby="emailHelp">
                                    @error('when')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
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

