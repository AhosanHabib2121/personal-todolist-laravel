@extends('layouts.dashboard_master')

@section('dashboard_title')
    Todo List
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    <h2>Todo List</h2>
                </div>
                <div class="card-body">
                    {{-- delete_message code start here --}}
                    @if(session('delete_message'))
                        <div class="alert alert-danger">
                            {{session('delete_message')}}
                        </div>
                    @endif
                    {{-- delete_message code end here --}}
                    {{-- success_message code start here --}}
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{session('success_message')}}
                        </div>
                    @endif
                    {{-- success_message code end here --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <a href="{{route('todo-list.create')}}" class="btn btn-outline-success">Task add</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                             {{-- Recycle file(butten) code start here --}}
                            <div class="mb-3 text-right">
                                <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-1x"> Trash</i></button>
                            </div>
                            {{-- Recycle file(butten) code end here --}}
                        </div>
                    </div>
                    {{-- Recycle file(modal) code start here --}}
                    <div class="modal fade" id="exampleModalCenter">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Todo List Recycle </h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-black table-responsive">
                                    <table class="table table-bordered table-inverse">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Task Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($delete_todo as $todo )
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$todo->task}}</td>
                                                    <td>
                                                        <div class="btn-group mb-2 btn-group">
                                                            <a href="{{route('restore',$todo->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                            <a href="{{route('force_delete',$todo->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan='50'>No data no show</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Recycle file(modal) code end here --}}
                    <div class="text-center mb-3">
                        <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                            @if ($todo_info->where('status','done')->count() != count($todo_info))
                                <a href="{{route('all.done')}}" type="button" class="btn btn-info ">All done</a>
                            @endif
                            @if (count($todo_info) > 0)
                                <a href="{{route('all.delete')}}" type="submit" class="btn btn-danger ">All delete</a>
                            @endif
                            {{-- <a href="" type="button" class="btn btn-warning ">Selete mark</a>
                            <a href="" type="button" class="btn btn-danger ">selete delete</a> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="todo_list_table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Task</th>
                                    <th>Date & Time</th>
                                    <th>Created by</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($todo_info as $todo )
                                    <tr>

                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$todo->task}}</td>
                                        <td>{{$todo->created_at->format('d/m/Y h:i:s')}}</td>
                                        <td>{{App\Models\User::find($todo->created_by)->name}}</td>
                                        <td class="
                                            @if ($todo->status == 'pending')
                                                text-danger
                                                @else
                                                    text-success
                                            @endif">
                                            {{$todo->status}}
                                        </td>
                                        <td class="d-flex">
                                            <div class="btn-group ">
                                                @if ($todo->status == 'pending')
                                                    <a href="{{route('single.done',$todo->id)}}" class=" btn text-info "><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>
                                                @endif
                                            </div>
                                            <form action="{{route('todo-list.destroy',$todo->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger mx-1"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center text-danger">
                                        <td colspan="50">No data no show</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dataTable_script')
    <script>
        $(document).ready( function () {
            $('#todo_list_table').DataTable();
        });
    </script>
@endsection

