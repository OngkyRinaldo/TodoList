<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $todos = TodoList::orderBy('completed')->get();
        return view('index', compact('todos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|max:255'
        ]);
        $todo = $request->title;
        TodoList::create(['title' => $todo]);
        return redirect()->back()->with('success', "TODO created successfully!");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $todo = TodoList::find($id);
        return view('edit')->with(['id' => $id, 'todo' => $todo]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */


   
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $updateTodo = TodoList::find($request->id);
        $updateTodo->update(['title' => $request->title]);
        return redirect('')->with('success', "TODO updated successfully!");
    }

    public function completed($id)
    {
        $todo = TodoList::find($id);
        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', "TODO marked as incomplete!");
        } else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('success', "TODO marked as complete!");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
 
    public function delete($id)
    {
        $todo = TodoList::find($id);
        $todo->delete();
        return redirect()->back()->with('success', "TODO deleted successfully!");
    }
}
