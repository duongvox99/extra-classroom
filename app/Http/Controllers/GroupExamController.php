<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupExamController extends Controller
{
    private $customMessages = [
        'numberOfSubmit.required' => 'Tên nhóm không được rỗng',
        'numberOfSubmit.min'  => 'Lớp không được rỗng',
        'name.unique' => 'Tên nhóm đã tồn tại',
        'name.max' => 'Tên nhóm phải ít hơn 255 ký tự'
    ];

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        return redirect()->action('GroupController@show', $group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        $exams = DB::table('exams')
            ->select([
                'exams.id',
                'exams.name'
            ])
            ->orderBy('exams.updated_at', 'desc')
            ->get();
        return view('teacher.groups.exams.create', compact(['group', 'exams']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group, Exam $exam)
    {
        //
    }
}
