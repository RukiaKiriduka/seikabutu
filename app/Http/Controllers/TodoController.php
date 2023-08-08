<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Brian2694\Toastr\Facades\Toastr;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $todos = Todo::orderByRaw('`deadline` IS NULL ASC')->orderBy('deadline')->get();

        return view('todos.index', [
            'todos' => $todos,
        ]);
        
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
            'newTodo'     => 'required|max:100',
            'newDeadline' => 'nullable|after:"now"', 
            ]);
            
         Todo::create([
            'todo'     => $request->newTodo,
            'deadline' => $request->newDeadline,
        ]);
        
        
        
        // フラッシュメッセージ
        Toastr::success('新しいタスクが追加されました！');

        return redirect()->route('todos.index');
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
    public function destroy(Todo $todo)
    {

        $todo->delete();
        
        // フラッシュメッセージ
        Toastr::success('タスクが削除されました！');

        return redirect()->route('todos.index');
    }
}
