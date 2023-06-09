<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_user=User::count();
        $total_expense_category=Expense::count();
        return view('home',compact('total_user','total_expense_category'));
    }

}
