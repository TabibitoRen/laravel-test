<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use DB;

class TodoListController extends Controller
{
    public function index() {
        return view('welcome', ['todoLists' => TodoList::all()]);
    }

    public function save(Request $request) {
        
        $newTodoList = new TodoList;
        $newTodoList->name =  $request->name;
        $newTodoList->save();

        return redirect('/');
    }

    public function delete(string $id) {
        
         DB::table('todo_lists')->where('id', $id)->delete();

         return redirect('/');
    }

    public function update(Request $request, string $id) {
        
        DB::table('todo_lists')->where('id', $id)->update(['name' => $request->name]);

        return redirect('/');
   }
}
