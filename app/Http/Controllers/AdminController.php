<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        return view('Admin.dashboard', [
            'users' => User::where('role', '!=', 'admin')->get(),
        ]);
    }
}
