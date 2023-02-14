<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;

class ClientsController extends Controller
{
    public function AllUsers(){

        $users = User::where('role','user')->latest()->get();
        return view('admin.users.index',compact('users'));
    }
}
