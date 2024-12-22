<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class ViewAllTask extends Controller
{

    public function index()
    {
        return view('userNotification.index',[
            'tasks' => Task::all(),
            'users' => User::all()
        ]);
    }

}
