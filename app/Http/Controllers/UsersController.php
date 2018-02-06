<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile(User $user)
    {
      return view('users.profile', compact('user'));
    }

    public function settings()
    {
      return view('users.settings');
    }
}
