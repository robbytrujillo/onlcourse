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

        $coursesQuery = Course::query();

        if ($user->hasRole('teacher')) {
            $coursesQuery->whereHas('teacher', function($query) use ($user) {
                $query->where('user_id', $user->id);
            });

            $students = CourseStudent::whereIn('course_id', $coursesQuery->select('id'))
            ->disctinc('user_id')
            ->count('user_id');
        } else {
            $students = CourseStudent::disctinc('user_id')->count('user_id');
        }

        $courses = $coursesQuery->count();
    }


}