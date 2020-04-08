<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use Illuminate\Http\Request;

class TopicQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function index(Topic $topic)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function create(Topic $topic)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic, Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic, Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, Question $question)
    {
        //
    }
}
