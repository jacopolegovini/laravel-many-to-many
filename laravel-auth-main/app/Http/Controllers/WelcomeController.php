<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();

        return view('welcome.welcome', compact('tasks', 'users'));
    }
}