<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $todos = Todo::latest()->where('status',1)->paginate(5);
    //     return view('welcome',compact('todos'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
      */
    // public function create()
    // {
    //     return view('todos.create-todo');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //    $data = $request->validate([
    //        'title' => 'required|string',
    //        'content' => 'required|string',
    //    ]);

    //    $data['status'] = 1;


    //    Todo::create($data);

    //    return redirect('/')->with('created','todo added successfully');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $todo = Todo::findOrFail($id);

    //     return view('todos.show-todo',\compact('todo'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $todo = Todo::findOrFail($id);
    //     return view('todos.edit',compact('todo'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $todo = Todo::findOrFail($id);
    //     $todo->title = $request->title;
    //     $todo->content = $request->content;
    //     $todo->status = 1;
        
    //     $todo->update();
    //     return redirect('/')->with('updated','todo updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $todo = Todo::findOrFail($id);
    //     $todo->delete();
    //     return redirect('/')->with('deleted','todo Deleted successfully');
    // }

    // public function complete_a_todo($id)
    // {
    //     $todo = Todo::findOrFail($id);

    //     $todo->status = 2;
    //     $todo->update();
    //     return redirect('/')->with('completed','todo Completed successfully');
    // }

    // public function completed_todo()
    // {
    //     $todos = Todo::where('status',2)->paginate(5);
    //     return view('todos.comleted-todo',compact('todos'));
    // }
}
