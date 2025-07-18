<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{   

    //use App\Http\Controllers\StudentController;
    //Route::get('students', [App\Http\Controllers\StudentController::class, 'index']);
    public function index()
    {
        return 'Welcome to the Student Controller Index';
    }

    //--------------------------------------------------------------------------------------------
    //http://127.0.0.1:8000/cabout
    protected $PNAME;
    protected $PAGE;

    // Constructor to initialize properties
    public function __construct()
    {
        $this->PNAME = 'T4ch';
        $this->PAGE = 20;
    }

    public function about()
    {
        $about = $this->privateAbout();
        $name = $this->PNAME;
        $age = $this->PAGE;

        return view('aboutUs3', [
            'about' => $about,
            'name' => $name,
            'age' => $age
        ]);

    }
    private function privateAbout()
    {
        return 'Welcome to the Student Controller Private About';
    }

    //--------------------------------------------------------------------------------------------
    public function studentName($name)
    {
        //http://127.0.0.1:8000/student/T4ch
        return 'Welcome to the Student Controller Student Name: ' . $name;
    }   
}
