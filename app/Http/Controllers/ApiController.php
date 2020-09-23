<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class ApiController extends Controller
{
    public function addTodo(Request $req){
        $todo = new Todo([
            'title' => $req->title
        ]);

        $todo->save();

        return response()->json([
            'message' => 'Added successfully'
        ]);
    }

    public function myTodo(){
        $todos = Todo::latest();

        return response()->json([
            'data' => $todos
        ]);
    }
}
