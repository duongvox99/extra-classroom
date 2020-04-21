<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use App\TypeClass;
use App\TypeQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use NcJoes\OfficeConverter\OfficeConverter;
use NcJoes\OfficeConverter\OfficeConverterException;

class QuestionController extends Controller
{
    private $listImgSrc;

    private $customMessages = [
        'question.required' => 'Nội dung câu hỏi không được rỗng',
        'answer1.required'  => 'Đáp án 1 không được rỗng',
        'answer2.required'  => 'Đáp án 2 không được rỗng',
        'answer3.required'  => 'Đáp án 3 không được rỗng',
        'answer4.required'  => 'Đáp án 4 không được rỗng',
        'solution.required'  => 'Lời giải không được rỗng',
        'document.required'  => 'Chưa chọn file docx'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = DB::table('questions')
            ->join('topics', 'topics.id', '=', 'questions.topic_id')
            ->join('type_questions', 'type_questions.id', '=', 'questions.type_question_id')
            ->join('type_classes', 'type_classes.id', '=', 'topics.type_class_id')
            ->select([
                'questions.id',
                'questions.question->content as question',
                'questions.question->answer as answer',
                'questions.updated_at as question_updated_at',
                'questions.true_answer',
                'questions.solution',
                'questions.note as note',
                'topics.class as class',
                'topics.name as topic_name',
                'type_questions.name as type_question_name',
                'type_classes.name as type_class_name'])
            ->orderBy('questions.updated_at', 'desc')
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
     * @return Response
     */
    public function create()
    {
        $typeQuestions = TypeQuestion::all(['id', 'name']);
        $topics = DB::table('topics')
            ->join('type_classes', 'type_classes.id', '=', 'topics.type_class_id')
            ->select([
                'topics.id as topicId',
                'topics.name as topicName',
                'topics.class',
                'type_classes.name as typeClassName'])
            ->orderBy('type_classes.name', 'desc')
            ->orderBy('topics.class', 'desc')
            ->orderBy('topics.name', 'asc')
            ->get();

        return view('teacher.questions.create', compact(['topics', 'typeQuestions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'question' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'solution' => 'required',
        ], $this->customMessages);

        Question::create([
            'type_question_id' => $request->typeQuestion,
            'question' => json_encode([
                'content' => $request->question,
                'answer' => [$request->answer1, $request->answer2, $request->answer3, $request->answer4]]),
            'true_answer' => $request->trueAnswer,
            'solution' => $request->solution,
            'topic_id' => $request->topic,
            'note' => $request->note
        ]);

        return redirect()->route('teacher.questions.index')->with('isStored', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showCreateFromImport()
    {
        return view('teacher.questions.import');
    }

    private function getNextImgSrc() {
        return next($this->listImgSrc);
    }

    private function handleImgSrcHtml($str) {
        if (preg_match_all('/src="(.*?)"/m', $str, $matches)) {
            $matches = $matches[1];

            for ($i = 0; $i < count($matches); $i++) {
                $str = str_replace($matches[$i], $this->getNextImgSrc(), $str);
            }
        }
        return $str;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws OfficeConverterException
     */
    public function storeFromImport(Request $request)
    {
        $validator = $request->validate([
            'document' => 'required'
        ], $this->customMessages);

        $file = $request->file('document');

        $documentName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', substr($file->getClientOriginalName(), 0, -5))));
        $documentExtension = $file->getClientOriginalExtension();

        $docxFile = $request->document->storeAs('question_bank/' . $documentName, $documentName . '.' . $documentExtension);

        $converter = new OfficeConverter(storage_path('app/question_bank/' . $documentName . '/' . $documentName . '.' . $documentExtension));
        $converter->convertTo('output.html'); //generates html file in same directory as .docx file

        Storage::delete($docxFile); // delete docx file

        $fullHtmlPath = storage_path('app/question_bank/' . $documentName . '/output.html');
        $htmlFile = fopen($fullHtmlPath, "r") or die("Unable to open file!");
        $htmlData = fread($htmlFile, filesize($fullHtmlPath));
        fclose($htmlFile);

        unlink($fullHtmlPath);

        $htmlData = str_replace('src="', 'src="/question_bank/' . $documentName .'/', $htmlData);
        if (preg_match_all('/src="(.*?)"/m', $htmlData, $matches)) {
            $this->listImgSrc = $matches[1];
        }
        array_unshift($this->listImgSrc, '#');

        foreach (json_decode($request->questions) as $question) {
            $typeClass = TypeClass::firstOrCreate(['name' => $question->type_class_name]);
            $topic = Topic::firstOrCreate(['name' => $question->topic_name, 'class' => $question->class, 'type_class_id' => $typeClass->id]);

            Question::create([
                'type_question_id' => $question->type_question_id,
                'question' => json_encode([
                    'content' => $this->handleImgSrcHtml($question->question->content),
                    'answer' => [$this->handleImgSrcHtml($question->question->answer[0]), $this->handleImgSrcHtml($question->question->answer[1]), $this->handleImgSrcHtml($question->question->answer[2]), $this->handleImgSrcHtml($question->question->answer[3])]]),
                'true_answer' => $question->true_answer,
                'solution' => $this->handleImgSrcHtml($question->solution),
                'topic_id' => $topic->id,
                'note' => $documentName . ' - Câu ' . $question->question_number
            ]);
        }

        return redirect()->route('teacher.questions.index')->with('isStoredFromDocxFile', true);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return Response
     */
    public function show(Question $question)
    {
        return view('teacher.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return Response
     */
    public function edit(Question $question)
    {
        return view('teacher.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Question  $question
     * @return Response
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
     * @param \App\Question $question
     * @return Response
     * @throws \Exception
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('teacher.questions.index')->with('isDestroyed', true);
    }
}
