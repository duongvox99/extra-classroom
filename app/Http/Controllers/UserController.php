<?php

namespace App\Http\Controllers;

use App\User;
use App\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class UserController extends Controller
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
        $users = DB::table('users')
            ->join('group_user', 'group_user.user_id', '=', 'users.id')
            ->join('groups', 'groups.id', '=', 'group_user.group_id')
            ->where('group_user.is_active', '=', true)
            ->where('users.type_user', '<>', 0)
            ->select([
                'users.id as userId',
                'users.avatar as userAvatar',
                'users.name as userName',
                'users.email as userEmail',
                'users.birthday as userBirthday',
                'users.class as userClass',
                'users.updated_at as userUpdatedAt',
                'groups.name as groupName'])
            ->orderBy('users.updated_at', 'desc')
            ->get();

        $groups = DB::table('groups')
            ->select([
                'groups.name as groupName',
                'groups.id as groupId'
            ])
            ->get();

        return view('teacher.users.index', compact('users', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $numRowTableUser = DB::table('users')->count();
            $id_user = (string)$numRowTableUser + 1;

            User::insert([
                'id' => $id_user,
                'name' => '',
                'email' => $request->Email,
                'type_user' => '1',
                'password' => '',
                'avatar'=>''
            ]);

            $numRowTableGroupUser = DB::table('group_user')->count();
            $users_id = DB::table('users')->where('email', $request->Email)->value('id');
            $users_id = (string)$users_id;

            GroupUser::insert([
                'user_id' => $users_id,
                'id' => $numRowTableGroupUser + 1,
                'group_id' => $request->Id,
                'is_active' => true
            ]);

        } catch (\PDOException $e) {

            if($e->getCode() == 23000)
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Email đã có sẵn >_<'
                    ]
                );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Thêm tài khoản học sinh thành công'
            ]
        );
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
            'email' => 'required|unique:users',
            'type_user' => 'required',
            'password' => 'required|min:8',
            'birthday' => 'required',
            'class' => 'required',
            'group_id' => 'required',
        ], $this->customMessages);

        User::create($request->all());

        return redirect()->route('teacher.users.index')->with('isStored', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Show view to create mass user of groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateMassUser()
    {
        return view('teacher.users.mass_user');
    }

    /**
     * Create mass user of groups.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createMassUser(Request $request)
    {
        //
    }
}
