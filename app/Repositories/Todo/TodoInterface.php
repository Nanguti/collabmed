<?php

namespace App\Repositories\Todo;


interface TodoInterface {
    public function getAllTodos();
    public function getTodoById($todoId);
    public function storeTodo($data);
    public function updateTodo($todo, $data);
    public function deleteTodo($todo);
}