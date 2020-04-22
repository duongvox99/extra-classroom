<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    private $customMessages = [
            'name.required' => 'Tên không được rỗng',
            'class.required'  => 'Lớp không được rỗng',
            'name.unique' => 'Tên đã tồn tại',
            'name.max' => 'Tên phải ít hơn 255 ký tự'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::where('id', '>', 1)->get();
        return view('teacher.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.topics.create');
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
            'name' => 'required|unique:topics|max:255',
            'class' => 'required',
        ], $this->customMessages);

        Topic::create($request->all());

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        if ($topic->id == 1)
        {
            abort(404);
        }
        return view('teacher.topics.edit', compact('topic'));
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
        $topic->update($request->all());

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
