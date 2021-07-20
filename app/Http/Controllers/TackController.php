<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TackController extends Controller
{
    public function index()
    {
        $tacks = Task::all();
        return view('tacks.list', compact('tacks'));
    }

    public function create()
    {
        return view('tacks.create');
    }

    public function store(Request $request)
    {
    $task = new Task();
    $task->title = $request->input('title');
    $task->content = $request->input('content');


    if ($request->hasFile('image')){
     $image = $request->file('image');
     $path = $image->store('image','public');
     $task->image=$path;
    }

    $task->dua_date = $request->input('dua_date');
    $task->save();

    Session::flash('success','tao moi thanh cong');
    return redirect()->route('tacks->index');
    }

    public function edit(){
        
    }
}
