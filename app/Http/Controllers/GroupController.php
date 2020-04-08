<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $customMessages = [
            'name.required' => 'Tên nhóm không được rỗng',
            'class.required'  => 'Lớp không được rỗng',
            'name.unique' => 'Tên nhóm đã tồn tại',
            'name.max' => 'Tên nhóm phải ít hơn 255 ký tự'
        ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::where('id', '>', 1)->get();
        foreach ($groups as $group) {
            $group->totalStudent = $group->users()->count();
        }
        return view('teacher.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.groups.create');
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

        Group::create($request->all());

        return redirect()->route('teacher.groups.index')->with('isStored', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $exams = $group->exams();
        if ($exams) {
            $group['exams'] = [];
        }
        else {
            $group['exams'] = $exams;
        }

        $notifications = $group->notifications();
        if ($notifications) {
            $group['notifications'] = [];
        }
        else {
            $group['notifications'] = $exams;
        }

        return view('teacher.groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        if ($group->id == 1)
        {
            abort(404);
        }
        return view('teacher.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'class' => 'required',
        ], $this->customMessages);
        $group->update($request->all());

        return redirect()->route('teacher.groups.index')->with('isUpdated', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Group $group
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('teacher.groups.index')->with('isDestroyed', true);
    }
}
