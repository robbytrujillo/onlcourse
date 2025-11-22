<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index() {
        $courses = Course::with(['category','teacher','students'])->orderByDesc('id')->get();

        return view('front.index', compact('courses'));
    }
   
    // public function details(Course $course) {
    //     return view('front.details');
    // }
}