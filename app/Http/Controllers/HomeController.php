<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ( $request->user()->type_user == 0) {
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('student.dashboard');
        }
    }

    /**
     * Display the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        //
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        //
    }

    /**
     * Update the profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        //
    }

    /**
     * Remove the all information of this profile from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyProfile()
    {
        //
    }
}
