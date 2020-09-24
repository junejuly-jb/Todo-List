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
            'asd' => 'sample',
            'message' => 'Added successfully'
        ]);
    }
    
    public function getTodo($id){
        $todo = Todo::find($id);

        return response()->json($todo);
    }

    public function myTodo(){
        $todos = Todo::latest()->get();

        return response()->json([
            'data' => $todos
        ]);
    }

    public function toggleTodo(Request $request, $id){
        $todo = Todo::find($id);
        $status = $request->status;

        if($status == 'incomplete'){
            $todo->status = 'completed';
            $todo->save();
            return response()->json([
                'message' => 'marked as complete'
            ]);
        }
        else{
            $todo->status = 'incomplete';
            $todo->save();
            return response()->json([
                'message' => 'marked as incomplete'
            ]);
        }

        
    }
}
