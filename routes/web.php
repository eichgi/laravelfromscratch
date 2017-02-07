<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    //return view('about', ['name' => 'Hiram']);

    $name = 'Bobo';
    $age = 44;
    //return view('about', compact('name', 'age'));

    //return view('about')->with('name', 'world');
    $tasks = ['Do laravel', 'Do nothing', 'Then, do everything'];
    //return view('about', compact('tasks'));

    $tasks = DB::table('tasks')->get();
    return view('tasks.index', compact('tasks'));
});

Route::get('/task/{task}', function ($id) {
    //dd($id);

    //$task = DB::table('tasks')->where('id', $id)->get();
    $task = DB::table('tasks')->find($id);
    return view('tasks.show', compact('task'));
});