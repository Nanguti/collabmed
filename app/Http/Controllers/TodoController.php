<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;

class TodoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        $todos = $this->todoRepository->getAllTodos();
        return TodoResource::collection($todos);
        

    }

    public function show(Todo $todo)
    {
        $todo = $this->todoRepository->getTodoById($todo);
        return TodoResource::collection($todo);
    }

    public function store(Request $request)
    {
        
       $todo =  $this->todoRepository->storeTodo($request->all());
       return new TodoResource($todo);
        
    }

    public function update(Request $request, Todo $todo)
    {
        $this->todoRepository->updateTodo($todo, $request->all());
        return new TodoResource($todo);
        
    }

    public function destroy(Todo $todo)
    {
        $this->todoRepository->deleteTodo($todo);
        return response()->json(null, 204);
    }
}
