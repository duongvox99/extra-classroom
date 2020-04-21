<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamQuestion;
use App\TypeClass;
use App\TypeQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    private $validatorArray = [
        'name' => 'required',
        'timeLimit' => 'required'
    ];

    private $customMessages = [
        'name.required' => 'Tên đề kiểm tra không được rỗng',
        'timeLimit.required'  => 'Thời gian làm bài không được rỗng'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $exams = DB::table('exams')
            ->select([
                'exams.id',
                'exams.name',
                'exams.updated_at as exam_updated_at',
                'exams.time_limit',
                'exams.number_questions'])
            ->orderBy('exams.updated_at', 'desc')
            ->get();

        foreach ($exams as $exam) {
            $totalQuestion = 0;
            foreach (json_decode($exam->number_questions, true) as $typeQuestion_numQuestion) {
                $totalQuestion += array_sum(array_values($typeQuestion_numQuestion));
            }
            $exam->totalQuestion = $totalQuestion;
        }

        return view('teacher.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $typeClasses = TypeClass::all(['id', 'name']);
        $typeQuestions = TypeQuestion::all(['id', 'name']);
        return view('teacher.exams.create', compact(['typeClasses', 'typeQuestions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createCustomByTopic()
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

        $totalQuestionInTopics = DB::table('questions')
            ->join('topics', 'topics.id', '=', 'questions.topic_id')
            ->join('type_questions', 'type_questions.id', '=', 'questions.type_question_id')
            ->groupBy(['topics.id', 'type_questions.id'])
            ->select(['topics.id as topicId', 'type_questions.id as typeQuestionId', DB::raw('count(*) as total')])
            ->get();

        foreach ($topics as $topic) {
            foreach ($totalQuestionInTopics as $totalQuestionInTopic) {
                if ($totalQuestionInTopic->topicId == $topic->topicId) {
                    $topic->totalQuestion[$totalQuestionInTopic->typeQuestionId] = $totalQuestionInTopic->total;
                }
            }
        }

        return view('teacher.exams.create_custom_by_topic', compact(['topics', 'typeQuestions']));
    }

    /**
     * Get list Id of question which random choose from topic.
     *
     * @param int $topicId
     * @param int $typeQuestionId
     * @param int $numberQuestionInTopic
     * @return array
     */
    private function getListQuestionIdInTopicByTypeQuestion($topicId, $typeQuestionId, $numberQuestionInTopic) {
        $questionIds = DB::table('questions')
            ->join('topics', 'topics.id', '=', 'questions.topic_id')
            ->join('type_questions', 'type_questions.id', '=', 'questions.type_question_id')
            ->where('topics.id', '=', $topicId)
            ->where('type_questions.id', '=', $typeQuestionId)
            ->select('questions.id')
            ->inRandomOrder()
            ->limit($numberQuestionInTopic)
            ->get()->toArray();

        $output = array();
        foreach ($questionIds as $questionId) {
            array_push($output, $questionId->id);
        }

        return $output;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $totalQuestionInClasses = DB::table('questions')
            ->join('topics', 'topics.id', '=', 'questions.topic_id')
            ->join('type_questions', 'type_questions.id', '=', 'questions.type_question_id')
            ->groupBy(['topics.class', 'topics.type_class_id', 'questions.type_question_id'])
            ->select(['topics.class', 'topics.type_class_id', 'questions.type_question_id', DB::raw('count(*) as total')])
            ->get();

        function getTotalQuestion($totalQuestionInClasses, $class, $typeClassId, $typeQuestionId) {
            foreach ($totalQuestionInClasses as $totalQuestionInClass) {
                if ($totalQuestionInClass->class == $class && $totalQuestionInClass->type_class_id == $typeClassId && $totalQuestionInClass->type_question_id == $typeQuestionId) {
                    return $totalQuestionInClass->total;
                }
            }
            return 0;
        }

        $typeQuestions = TypeQuestion::all(['id']);
        $typeClasses = TypeClass::all(['id']);

        $listQuestionId = array();
        $numberQuestions = array();

        function getTopicIds($class, $typeClassId, $typeQuestionId) {
            return DB::table('topics')
                ->join('questions', 'questions.topic_id', '=', 'topics.id')
                ->where('topics.class', '=', $class)
                ->where('topics.type_class_id', '=', $typeClassId)
                ->where('questions.type_question_id', '=', $typeQuestionId)
                ->distinct()
                ->get(['topics.id'])->toArray();
        }

        for ($class = 12; $class >= 10; $class--){
            foreach ($typeQuestions as $typeQuestion) {
                foreach ($typeClasses as $typeClass) {
                    $key = 'class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id;
                    $numberQuestion = intval($request->$key);
                    if ($numberQuestion > 0) {
                        // use for validate
                        $this->customMessages['class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id . '.required'] = 'Không được rỗng';
                        $this->customMessages['class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id . '.max'] = 'Chỉ có :max câu trong ngân hàng';

                        $this->validatorArray['class_' . $class . '_typeClass_' . $typeClass->id . '_typeQuestion_' . $typeQuestion->id] = 'required|numeric|max:' . getTotalQuestion($totalQuestionInClasses, $class, $typeClass->id, $typeQuestion->id);

                        // use for divide to topic
                        $topicIds = getTopicIds($class, $typeClass->id, $typeQuestion->id);
                        $numberTopic = count($topicIds);
                        if ($numberTopic > 0) {
                            $numberQuestionEachTopic = round($numberQuestion / $numberTopic);
                            foreach ($topicIds as $topicId) {
                                if ($numberQuestion - $numberQuestionEachTopic >= 0) {
                                    $numberQuestionInTopic = $numberQuestionEachTopic;
                                    $numberQuestion -= $numberQuestionEachTopic;
                                }
                                else {
                                    $numberQuestionInTopic = $numberQuestion - $numberQuestionEachTopic;
                                    $numberQuestion -= $numberQuestionEachTopic;
                                }

                                $numberQuestions[$topicId->id][$typeQuestion->id] = $numberQuestionInTopic;
                                $listQuestionId = array_merge($listQuestionId, $this->getListQuestionIdInTopicByTypeQuestion($topicId->id, $typeQuestion->id, $numberQuestionInTopic));

                                if ($numberQuestion == 0) {
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }

        $validator = $request->validate($this->validatorArray, $this->customMessages);

        $examId = Exam::create([
            'name' => $request->name,
            'number_questions' => json_encode($numberQuestions),
            'time_limit' => $request->timeLimit
        ])->id;

        $dataExamQuestion = array();
        foreach ($listQuestionId as $questionId) {
            array_push($dataExamQuestion, array('exam_id' => $examId, 'question_id' => $questionId));
        }
        ExamQuestion::insert($dataExamQuestion);

        return redirect()->route('teacher.exams.index')->with('isStored', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function storeCustomByTopic(Request $request)
    {
        $validator = $request->validate($this->validatorArray, $this->customMessages);

        $listQuestionId = array();
        $numberQuestions = array();
        foreach ($request->keys() as $key) {
            if (preg_match_all('/topicId_([0-9]+)_typeQuestionId_([0-9]+)/', $key, $matches)) {
                $topicId = $matches[1][0];
                $typeQuestionId = $matches[2][0];

                if ($request->$key != 0) {
                    $numberQuestionInTopic = intval($request->$key);
                    $numberQuestions[$topicId][$typeQuestionId] = $numberQuestionInTopic;
                    $listQuestionId = array_merge($listQuestionId, $this->getListQuestionIdInTopicByTypeQuestion($topicId, $typeQuestionId, $numberQuestionInTopic));
                }
            }
        }

//        $listClass = [];

        $examId = Exam::create([
            'name' => $request->name,
            'number_questions' => json_encode($numberQuestions),
//            'list_class' => json_encode($listClass),
            'time_limit' => $request->timeLimit
        ])->id;


        $dataExamQuestion = array();
        foreach ($listQuestionId as $questionId) {
            array_push($dataExamQuestion, array('exam_id' => $examId, 'question_id' => $questionId));
        }
        ExamQuestion::insert($dataExamQuestion);

        return redirect()->route('teacher.exams.index')->with('isStored', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Exam  $exam
     * @return Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('teacher.exams.index')->with('isDestroyed', true);
    }
}
