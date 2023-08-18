<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todo)
    {
        
        return view('todos.index')->with(['todos' => $todo->getPaginateByLimit()]);
        
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
    public function store(Todo $todo, Request $request)
    {
        
        $input = $request['todo'];
        $user = $request->user();
        $input += ['user_id' => $user->id]; 
        $todo = new Todo();
        $todo->fill($input)->save();
        //return redirect('/todos' . $todo->id);
        return redirect()->back();
        
        
        // フラッシュメッセージ
        //Toastr::success('新しいタスクが追加されました！');

       // return redirect()->route('todos.index');
    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
          return view('todos.edit')->with(['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'updateTodo'     => 'required|max:100',
            'updateDeadline' => 'nullable|after:"now"',
        ]);

        $todo = Todo::find($id);

        $todo->todo     = $request->updateTodo;
        $todo->deadline = $request->updateDeadline;

        $todo->save();

        
        Toastr::success('タスクが変更されました！');

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Todo $todo)
    */
    
    public function delete(Todo $todo)
{
    $todo->delete();
    return redirect()->back();
}
}
