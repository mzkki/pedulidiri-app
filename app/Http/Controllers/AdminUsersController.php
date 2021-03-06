<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('page')) {
            $skipped = (request()->input('page') - 1) * 5;
        } else {
            $skipped = 0;
        }

        return view('admin.users.index', [
            'title' => 'Data Users',
            'users' => User::latest()->paginate(5),
            'skipped' => $skipped
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules['fullname'] = 'required|string|max:255';

        if ($request->nik != $user->nik) {
            $rules['nik'] = 'required|min:16|max:16|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);
        return redirect()->to('users')->with('success', 'Data User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        History::where('user_id', $user->id)->delete();
        return redirect()->to('users')->with('success', 'User Berhasil dihapus');
    }
}
