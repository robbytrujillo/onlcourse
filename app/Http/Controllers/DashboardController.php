<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() {
        $user = Auth::user();

        $courseQuery = Course::query();

        if ($user->hasRole('teacher')) {
            $courseQuery->whereHas('teacher', function($query) use ($user) {
                $query->where('user_id', $user->id);
            });

            $students = CourseStudent::whereIn('course_id', $courseQuery->select('id'))
            ->disctinc('user_id')
        }
    }


}