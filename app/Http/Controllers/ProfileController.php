<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display user profile
     *
     * @param $username string
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($username)
    {
        $user = User::whereUsername($username)->get();

        return view('Frontend.profile', compact('user'));

    }

    /**
     * Updates user profile picture
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProfilePicture(Request $request)
    {
        $profilePicture = $request->file('avatar');

        $user = User::whereUsername($request->username)->get();

        $user->map(function ($user) use ($profilePicture) {
            $user->clearMediaCollection('profile-pictures');
            $user->addMedia($profilePicture)->toMediaCollection('profile-pictures');
        });
        return response()->json('success');
    }


    /**
     * Change user password
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($id);

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return response()->json('password updated');
    }
}
