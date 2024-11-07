<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();

        return view('welcome.welcome', compact('projects', 'users'));
    }
}
