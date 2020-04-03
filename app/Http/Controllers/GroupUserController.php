<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function index(Group $group)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group, User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group, User $user)
    {
        //
    }


    /**
     * Show view to create mass user of group.
     *
     * @param  int  group_id
     * @return \Illuminate\Http\Response
     */
    public function showCreateMassUser($group_id)
    {
        //
    }

    /**
     * Create mass user of group.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  group_id
     * @return \Illuminate\Http\Response
     */
    public function createMassUser(Request $request, $group_id)
    {
        //
    }
}