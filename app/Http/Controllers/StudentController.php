<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Show the teacher dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function studentDashboard()
    {
        return view('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function showNotifications()
    {
        //
    }

    /**
     *
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function showExams()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function showNotification($id)
    {
        //
    }

    /**
     *
     * Show exam to do or show result after do exam.
     *
     * @param int $id (exam_id)
     * @return \Illuminate\Http\Response
     */
    public function showExam($id)
    {
        //
    }

    /**
     *
     * User did the exam and submit answer to sever.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id (exam_id)
     * @return \Illuminate\Http\Response
     */
    public function submitAfterDoExam(Request $request, $id)
    {
        //
    }
}
