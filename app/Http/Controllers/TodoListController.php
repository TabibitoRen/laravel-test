<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index() {
        return view('welcome', ['todoLists' => TodoList::all()]);
    }

    public function saveItem(Request $request) {
        
        $newTodoList = new TodoList;
        $newTodoList->name =  $request->name;
        $newTodoList->save();

        return redirect('/');
    }
}
