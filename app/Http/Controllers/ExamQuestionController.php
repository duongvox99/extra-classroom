<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\Question;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam, Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam, Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam, Question $question)
    {
        //
    }
}
