<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function index() {
        $tasks = DB::table('tasks')->get();
        return view('task', data: compact('tasks'));
    }

    public function create() {
        $taskName = $_POST['name'];
    DB::table('tasks')->insert(values: ['name' => $taskName]);
    return redirect()->back();
    }

    public function destroy($id) {
        DB::table('tasks')->where(column: 'id', operator: $id)->delete();
        return redirect()->back();
    }
    public function edit($id) {
        $task  = DB::table('tasks')->where(column: 'id', operator: $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('task', data: compact('task', 'tasks'));
    }
    public function update() {
        $id = $_POST['id'];
    DB::table('tasks')->where(column: 'id', operator: $id)->update(['name' => $_POST['name']]);

    return redirect(to: 'task');
    }

}
