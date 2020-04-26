<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TypeClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    private $customMessages = [
            'name.required' => 'Tên không được rỗng',
            'class.required'  => 'Lớp không được rỗng',
            'name.max' => 'Tên phải ít hơn 255 ký tự'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = DB::table('topics')
            ->join('type_classes', 'type_classes.id', '=', 'topics.type_class_id')
            ->select([
                'topics.id as topicId',
                'topics.name as topicName',
                'topics.class',
                'description',
                'topics.updated_at as topicUpdatedAt',
                'type_classes.name as typeClassName'])
            ->orderBy('topics.updated_at', 'desc')
//            ->orderBy('topics.class', 'desc')
//            ->orderBy('type_classes.name', 'desc')
            ->orderBy('topics.name', 'asc')
            ->get();
        return view('teacher.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeClasses = TypeClass::all(['id', 'name']);
        return view('teacher.topics.create', compact('typeClasses'));
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
            'name' => 'required|max:255',
            'class' => 'required',
        ], $this->customMessages);

        Topic::create([
            'name' => $request->name,
            'type_class_id' => $request->typeOfClassId,
            'class' => $request->class,
            'description' => $request->description
        ]);

        return redirect()->route('teacher.topics.index')->with('isStored', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $typeClasses = TypeClass::all(['id', 'name']);
        return view('teacher.topics.show', compact(['topic', 'typeClasses']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $typeClasses = TypeClass::all(['id', 'name']);
        return view('teacher.topics.edit', compact(['topic', 'typeClasses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
        ], $this->customMessages);
        $topic->update([
            'name' => $request->name,
            'type_class_id' => $request->typeOfClassId,
            'class' => $request->class,
            'description' => $request->description
        ]);

        return redirect()->route('teacher.topics.index')->with('isUpdated', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('teacher.topics.index')->with('isDestroyed', true);
    }
}
