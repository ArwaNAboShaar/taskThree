<?php

use App\Http\Controllers\TaskController;

use App\Http\Controllers\UserController;
use Carbon\Factory;
use Illuminate\Console\View\Components\Factory as ComponentsFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/',  function () {
    return view('welcome');
});
Route::get('/app',  function () {
    return view('layouts.app');
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

Route::get('/task', action: [TaskController::class, 'index']);

Route::post('create', action: [TaskController::class, 'create']);

Route::post('delete/{id}',  action: [TaskController::class, 'destroy']);

Route::post('edit/{id}',  action: [TaskController::class, 'edit']);

Route::post('update',  action: [TaskController::class, 'update']);

Route::get('/user', action: [UserController::class, 'index']);

Route::post('create', action: [UserController::class, 'create']);

Route::post('delete/{id}',  action: [UserController::class, 'destroy']);

Route::post('edit/{id}',  action: [UserController::class, 'edit']);

Route::post('update',  action: [UserController::class, 'update']);
