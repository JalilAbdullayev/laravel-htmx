<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TodoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $todos = Todo::latest('updated_at')->get();
        return view('crud', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request): RedirectResponse|View {
        Todo::create($request->validated());
        if($request->header('HX-Request')) {
            return view('crud', ['todos' => Todo::latest('updated_at')->get()]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo): View {
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo): RedirectResponse|View {
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        if($request->header('HX-Request')) {
            return view('crud', ['todos' => Todo::latest('updated_at')->get()]);
        }
        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): void {
        Todo::findOrFail($todo->id)->delete();
    }
}
