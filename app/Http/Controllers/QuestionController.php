<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('questions')
            ->join('topics', 'topics.id', '=', 'questions.topic_id')
            ->join('type_questions', 'type_questions.id', '=', 'questions.type_question_id')
            ->join('type_classes', 'type_classes.id', '=', 'questions.type_class_id')
            ->select([
                'questions.id',
                'questions.question->content as question',
                'questions.question->answer as answer',
                'questions.updated_at as question_updated_at',
                'questions.true_answer',
                'questions.solution',
                'questions.class',
                'topics.name as topic_name',
                'type_questions.name as type_question_name',
                'type_classes.name as type_class_name'])
            ->orderBy('questions.created_at', 'desc')
            ->simplePaginate(20);

        $currentPage = $questions->currentPage();
        $from = $questions->firstItem();
        $previousPageUrl = $questions->previousPageUrl();
        $nextPageUrl = $questions->nextPageUrl();

        return view('teacher.questions.index', compact(['questions', 'currentPage', 'from', 'nextPageUrl', 'previousPageUrl']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:groups|max:255',
            'class' => 'required',
        ], $this->customMessages);

        Question::create($request->all());

        return redirect()->route('teacher.questions.index')->with('isStored', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('teacher.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('teacher.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
        ], $this->customMessages);
        $question->update($request->all());

        return redirect()->route('teacher.questions.index')->with('isUpdated', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('teacher.questions.index')->with('isDestroyed', true);
    }
}
