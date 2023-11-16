<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use App\Repositories\Todo\TodoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodoRepository implements TodoInterface
{
    public function getAllTodos(){
        $user = Auth::user();
        if($user->isAdmin){
            return Todo::all();
        }
        return Todo::where('organization_id', $user->organization_id)->get();
    }
    public function getTodoById($todoId)
    {
        return Todo::find($todoId);
    }

    public function storeTodo($data)
    {

        Log::info($data);
        return Todo::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'organization_id' => Auth::user()->organization_id
        ]);
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
