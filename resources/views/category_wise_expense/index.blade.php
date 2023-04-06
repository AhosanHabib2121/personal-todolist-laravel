@extends('layouts.dashboard_master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    <h2>Category Wise Expense</h2>
                </div>
                <div class="card-body">
                    @if(session('delete_message'))
                        <div class="alert alert-danger">
                            {{session('delete_message')}}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="category_wise_table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Expense Category Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category_info as $single_category_info )
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$single_category_info->category_name}}</td>
                                        <td>{{$single_category_info->amount}}</td>
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
            $('#category_wise_table').DataTable();
        });
    </script>
@endsection


