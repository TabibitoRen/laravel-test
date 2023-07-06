<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoList;
use DB;

class TodoController extends Controller
{
    public function view($id) {
        return view('todo_list', [
            'todoList' => TodoList::get()->where('id', $id)->first(),
            'todos' => Todo::get()->where('todo_list_id', $id),
        ]);
    }

    public function save(Request $request, $todo_list_id) {
        
        $newTodo = new Todo;
        $newTodo->todo_list_id =  $todo_list_id;
        $newTodo->name =  $request->name;
        $newTodo->is_completed =  0;
        $newTodo->save();

        return redirect("todo_list/{$todo_list_id}");
    }

    public function delete(string $todo_list_id, string $id) {
        
        DB::table('todos')->where([
            'id' => $id,
            'todo_list_id' => $todo_list_id
        ])->delete();

        return redirect("todo_list/{$todo_list_id}");
    }

    public function markCompleted(string $todo_list_id, string $id) {
        
        DB::table('todos')->where('id', $id)->update(['is_completed' => 1]);

        return redirect("todo_list/{$todo_list_id}");
    }

}
