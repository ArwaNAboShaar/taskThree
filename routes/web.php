<?php

use Carbon\Factory;
use Illuminate\Console\View\Components\Factory as ComponentsFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/',  function () {
    return view('welcome');
});

Route::get('/about',  function () {
    $name = 'Badran';
    $d = [
        1 => 'Technical',
        2 => 'Financial',
        3 => 'sales'
    ];

    // return view('about', ['name' => $name, 'd' => $d]);
    // return view('about')->with('name', $name);
    return view('about', data: compact('name', 'd'));
});

Route::post('/about',  function () {
    $name = $_POST['name'];
    $d = [
        1 => 'Technical',
        2 => 'Financial',
        3 => 'sales'
    ];
    // return view('about', ['name' => $name, 'd' => $d]);
    // return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view('about', data: compact('name', 'd'));
});

Route::get('/task',  function () {
    $tasks = DB::table('tasks')->get();
    return view('task', data: compact('tasks'));
});

Route::post('create',  function () {
    $taskName = $_POST['name'];
    DB::table('tasks')->insert(values: ['name' => $taskName]);
    return redirect()->back();
});

Route::post('delete/{id}',  function ($id) {
    DB::table('tasks')->where(column: 'id', operator: $id)->delete();
    return redirect()->back();
});

Route::post('edit/{id}',  function ($id) {
    $task  = DB::table('tasks')->where(column: 'id', operator: $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('task', data: compact('task', 'tasks'));
});

Route::post('update',  function () {
    $id = $_POST['id'];
    DB::table('tasks')->where(column: 'id', operator: $id)->update(['name' => $_POST['name']]);

    return redirect(to: 'task');
});
