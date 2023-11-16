<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use App\Repositories\Todo\TodoInterface;

class TodoRepository implements TodoInterface
{
    public function getAllTodos(){
        return Todo::all();
    }
    public function getTodoById($todoId)
    {
        return Todo::find($todoId);
    }

    public function storeTodo($data)
    {
        
        return Todo::create($data);
    }

    public function updateTodo($todo, $data)
    {
        $todo->update($data);
    }

    public function deleteTodo($todo)
    {
        $todo->delete();
    }
}
