<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;



class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_info=TodoList::all();
        $delete_todo=TodoList::onlyTrashed()->get();
        return view('todo-list.index',compact('todo_info','delete_todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo-list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task'=>'required|unique:todo_lists'
        ],[
            'task.required'=>'please enter the task name then try!',
            'task.unique'=>'already taken this name please give a new name then try',
        ]);
        TodoList::insert([
            'task'=>$request->task,
            'created_by'=>auth()->id(),
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success_message','Task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {
        // return $todoList->id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoList $todoList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        $todoList->delete();
        return back()->with('delete_message','task delete completed!');
    }

    public function singleDone($id)
    {
        $done=TodoList::find($id);
        $done->status='done';
        $done->save();
        return back()->with('success_message','task done completed!');
    }
    public function allDone()
    {
        DB::table('todo_lists')->update(['status'=>'done']);
        return back()->with('success_message','task alldone completed!');
    }
    public function allDelete()
    {
        TodoList::truncate();
        return back()->with('delete_message','task delete completed!');
    }
    public function restore($id)
    {
        TodoList::onlyTrashed()->where('id',$id)->restore();
        return back();
    }
    public function forceDelete($id)
    {
        TodoList::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }


}
