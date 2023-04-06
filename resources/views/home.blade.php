@extends('layouts.dashboard_master')

@section('dashboard_title')
    Dashboard Home
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-danger">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">User</p>
                                <h3 class="text-white">{{$total_user}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-warning">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fa fa-shield" aria-hidden="true"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Expense Category</p>
                                <h3 class="text-white">{{$total_expense_category}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="flaticon-381-calendar-1"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Appointment</p>
                                <h3 class="text-white">76</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


