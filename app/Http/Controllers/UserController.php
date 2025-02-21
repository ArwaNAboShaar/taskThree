<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('user', data: compact('users'));
    }

    public function create()
    {
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $userPass = $_POST['password'];
        DB::table('users')->insert(values: ['name' => $userName, 'email' => $userEmail, 'password' => $userPass]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::table('users')->where(column: 'id', operator: $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $user  = DB::table('users')->where(column: 'id', operator: $id)->first();
        $users = DB::table('users')->get();
        return view('user', data: compact('user', 'users'));
    }
    public function update()
    {
        $id = $_POST['id'];
        DB::table('users')->where(column: 'id', operator: $id)->update(['name' => $_POST['name'],'email' => $_POST['email'],'password' => $_POST['password']]);

        return redirect(to: 'user');
    }
}
