<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Task extends Model
{
    public function user() {
        $this->belongsTo(User::class);
    }

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
