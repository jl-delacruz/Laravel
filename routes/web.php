<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/welcome', function () {
    return view('welcome'); //show welcome.blade.php
});

Route::get('/', function () {
    return 'Hello World'; //show Hello World
});

//group routes using prefix
Route::prefix('details')->group(function () {
    Route::get('/name', function () {   //same as details/name
        return 'T4ch';
    })->name('name-details');

    Route::get('/age', function () {    //same as details/age
        return '20';
    })->name('age-details');
});

Route::get('/user/{id}', function ($id) {
    //http://127.0.0.1:8000/user/1
    return 'User ID: ' . $id; 
})->where('id', '[0-9]+'); //only accept numbers

Route::fallback(function () {
    return 'Page not found'; //show Page not found for any unmatched route
});


// --------------------------------------------------------------------------------------------
Route::get('/about', function () {
    $name = 'T4ch';
    $email = 'jldelacruz@gmail.com';
    //return view('aboutUs')->with('name', $name)->with('email', $email);
    //return view('aboutUs', compact('name', 'email'));
    //same as above
    return view('aboutUs', ['name' => $name, 'email' => $email]);
});

//no need to use return view() if using Route::view()
Route::view('/contact', 'contactUs', [
    'name' => 'T4ch',
    'email' => 'jldelacruz@gmail.com'
]);

//--------------------------------------------------------------------------------------------
Route::get('/about/{name}/{email}', function ($name, $email) {
    //possible URLs:
    //http://127.0.0.1:8000/about/T4ch/jldelacruz@gmail.com
    //http://127.0.0.1:8000/about?name=T4ch&email=jldelacruz@gmail.com
    
    return view('aboutUs2', ['name' => $name, 'email' => $email]);
});

Route::get('/about2', function () {
    //http://127.0.0.1:8000/about2?name=T4ch&email=jldelacruz@gmail.com
    return view('aboutUs2'); // No variables passed
});

//--------------------------------------------------------------------------------------------

Route::get('/sample', function () {
    return view('sample'); // No variables passed
});

//---------------------------------------------------------------------------------------------
//use App\Http\Controllers\StudentController;
//http://127.0.0.1:8000/students
Route::get('student', [App\Http\Controllers\StudentController::class, 'index']);

//group routes using controller
Route::controller(StudentController::class)->group(function () {
    Route::get('cstudents', 'index');
    Route::get('cabout', 'about');
});

// http://127.0.0.1:8000/student/T4ch
Route::get('student/{name}', [App\Http\Controllers\StudentController::class, 'studentName']);
