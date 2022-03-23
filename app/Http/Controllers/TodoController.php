<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todo.index', [
            'todos' => Todo::paginate(10),
            'name' => 'Humaimi',
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
        return view('todo.create', [
            // 'todos' => Todo::paginate(10),
            // 'name' => 'Humaimi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|min:2'
        ]);
        $todo = new Todo();
        $todo->name = $validated['name'];
        $todo->save();

        return redirect('/todos')->with('status', 'New Todo ' . $validated['name'] . ' Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view('todo.edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        // dd($request->all(), $todo);
        $validated = $request->validate([
            'name' => 'required|string|min:2'
        ]);

        $todo->name = $validated['name'];
        $todo->save();

        return redirect('/todos')->with('status', 'Todo ' . $validated['name'] . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        // return redirect('/todos');
        return redirect('/todos')->with('status',  $todo->name . ' Deleted');
    }
}
