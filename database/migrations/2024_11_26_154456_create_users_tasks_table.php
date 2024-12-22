<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('users_tasks', function (Blueprint $table) {
            
            $table->string('taskname');
            $table->string('description');
            $table->string('email')->unique();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->timestamps();

            // $table->foreign('username')->references('name')->on('users')
            //     ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_tasks');
    }
};
