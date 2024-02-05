<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // You can customize this query based on your needs
        return view('users.index', compact('users'));
    }
}
