<?php

namespace App\Http\Controllers;

use App\Mail\Tasks;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TasksController extends Controller
{

    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::latest()->paginate(20),
            'users' => User::latest()->paginate(20),
            'userdata' => User::all()->reverse()
        ]);
    }


    public function create()
    {
        return view('tasks.taskusers');
    }


    public function store(Request $request)
    {

        $data = [
            'task_name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start,
            'end_at' => $request->end
        ];

        Mail::to('mustafa.amirzada.afg@gmail.com')->send(new Tasks($data));
        
        $task = new Task;
        $task->user_id = $request->user_id;
        $task->taskname = $request->name;
        $task->description = $request->description;
        $task->email = $request->email;
        $task->start_at = $request->start;
        $task->end_at = $request->end;
        $task->save();

        return redirect()->route('mail');
    }


    public function show(Task $task)
    {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->user_id = $request->user_id;
        $task->taskname = $request->name;
        $task->description = $request->description;
        $task->email = $request->email;
        $task->start_at = $request->start;
        $task->end_at = $request->end;
        $task->save();

        return redirect()->back();
    }


    public function destroy(string $id)
    {
        //
    }
}
