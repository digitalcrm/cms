<?php

namespace App\Http\Controllers\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileInfoRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileinfo = Auth::user();
        // dd($profileinfo->full_name);
        return view('userprofile.profile-page', compact('profileinfo'));
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
    public function show(User $auth_profile)
    {
        // return view('userprofile.profile-page', compact('auth_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $auth_profile)
    {
        // return view('userprofile.profile-page', compact('auth_profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileInfoRequest $request, User $auth_profile)
    {
        $input = $request->validated();

        $photo = $request->profile_photo_path;

        // // dd($input);

        $auth_profile->update($input);

        if ($request->hasFile('profile_photo_path')) {

            $auth_profile->updateProfilePhoto($photo);
        }


        return redirect()->back()->withInfo('Profile updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
