<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Tasks;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request) {

        $data = [
            'task_name' => $request->name,
            'description' => $request->description,
            'start_at' => $request->start,
            'end_at' => $request->end
        ];

        // $delay = now()->addUTCDays(8);
        Mail::to('mustafa.amirzada.afg@gmail.com')->send(new Tasks($data));
        
        return redirect()->route('tasks.index');

    }

}
