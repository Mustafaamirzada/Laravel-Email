<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewAllTask;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::resource('/', ViewAllTask::class)
    ->only(['index']);

Route::resource('user', UsersController::class);
Route::resource('tasks', TasksController::class);

Route::get('/contact', function () {
    return view('userNotification.contact');
})->name('contact');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');



Route::get('mail', [MailController::class, 'send'])->name('mail');
