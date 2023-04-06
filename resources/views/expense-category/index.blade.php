@extends('layouts.dashboard_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center">
                    <h2>Expense Category name list</h2>

                    {{-- Recycle file(butten) code start here --}}
                    <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash fa-1x"> Trash</i></button>
                    {{-- Recycle file(butten) code end here --}}
                </div>
                {{-- Recycle file(modal) code start here --}}
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Expense Recycle </h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-black">
                                <table class="table table-bordered table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Task Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($delete_expense as $expense )
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$expense->category_name}}</td>
                                                <td>
                                                    <div class="btn-group mb-2 btn-group">
                                                        <a href="{{route('restore.category',$expense->id)}}" class="btn btn-success btn-square btn-xs">Restore</a>
                                                        <a href="{{route('category_force_delete',$expense->id)}}" class="btn btn-danger btn-square btn-xs">Permanent Delete</a>
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
                <div class="card-body">
                    @if(session('delete_message'))
                        <div class="alert alert-danger">
                            {{session('delete_message')}}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="expense_category_table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Expense Category Name</th>
                                    <th>Amount</th>
                                    <th>Purpose</th>
                                    <th>When</th>
                                    <th>Created by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category_info as $single_category_info )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$single_category_info->category_name}}</td>
                                        <td>{{$single_category_info->amount}}</td>
                                        <td>{{$single_category_info->purpose}}</td>
                                        <td>
                                            {{ date('d-m-Y h:i:s A', strtotime($single_category_info->when))}}
                                        </td>
                                        <td>{{App\Models\User::find($single_category_info->created_by)->name}}</td>
                                        <td>
                                            <form action="{{route('expense.destroy',$single_category_info->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-square btn-xs mx-1">Delete</button>
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
            $('#expense_category_table').DataTable();
        });
    </script>
@endsection

