<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($username)
    {
        $user = User::where('username', $username)->with('media')->first();
        // dd($user);

        $media = $user->getMedia('profile-pictures')->first() ? $user->getMedia('profile-pictures')->first()->getUrl() : $this->defaultProfilePicture();

        $media = asset($media);

        return view('profile', compact('user', 'media'));
    }

    public function storeProfilePicture(Request $request, $username)
    {
        $profilePicture = $request->file('avatar');

        $user = User::where('username', $request->username)->first();

        $user->clearMediaCollection('profile-pictures');;

        $user->addMedia($profilePicture)->toMediaCollection('profile-pictures');

        return response()->json('success');
    }

    public function defaultProfilePicture()
    {
        return 'global_assets/images/placeholders/placeholder.jpg';
    }
}
