<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.userlist', ['users' => User::all()]);
    }

    /**
     * Grants permission to use the light
     */
    public function grantAuthorization(User $user)
    {
        $user->has_light_permission = true;
        $user->save();
        return back();
    }

    /**
     * Revokes permission to use the light
     */
    public function revokeAuthorization(User $user)
    {
        $user->has_light_permission = false;
        $user->save();
        return back();
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
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
