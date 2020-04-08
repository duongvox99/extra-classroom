<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Show the teacher dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teacherDashboard()
    {
        return view('teacher.index');
    }
}
