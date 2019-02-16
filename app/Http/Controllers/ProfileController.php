<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Models\EmployeesDeduction;
use App\Models\Payroll;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Plank\Mediable\MediaUploader;

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
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($username)
    {

        $user = User::whereUsername($username)->first();

        if (auth()->user() != $user) {
            return redirect()->back();
        }

        $current_month = Carbon::now()->format('ym');

        $last_month = Carbon::now()->subMonth(1)->format('ym');

        $payroll = Payroll::where('employee_id', $user->employee->syhos_emp_id)
            ->where('payroll_month', $current_month)
            ->limit(1)
            ->get();

        if (!count($payroll)) {
            $payroll = Payroll::where('employee_id', $user->employee->syhos_emp_id)
                ->where('payroll_month', $last_month)
                ->limit(1)
                ->get();
        }

        $deductions = EmployeesDeduction::with('deduction')
            ->where('employee_id', $user->employee->syhos_emp_id)
            ->get();

//        dd($deductions);

        if ($user) {
            if ($user->firstMedia('profile-pictures')) {

                $profilePicture = $user->firstMedia('profile-pictures');

                $profilePicture = asset($profilePicture->getUrl());
            } else {
                $profilePicture = $this->defaultProfilePicture();
            }

        }

        return view('profile', compact('user', 'profilePicture', 'payroll', 'deductions'));

    }

    /**
     * Updates user profile picture
     *
     * @param Request $request
     * @param MediaUploader $mediaUploader
     * @return \Illuminate\Http\JsonResponse
     * @throws \Plank\Mediable\Exceptions\MediaUpload\ConfigurationException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileExistsException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotFoundException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileNotSupportedException
     * @throws \Plank\Mediable\Exceptions\MediaUpload\FileSizeException
     */
    public function storeProfilePicture(Request $request, MediaUploader $mediaUploader)
    {
        $user = User::whereUsername($request->username)->first();

        $old_media = $user->getMedia('profile-pictures');


        if ($old_media) {

            $old_media->each->delete();
        }

        $new_profile_picture = $mediaUploader
            ->fromSource($request->file('avatar'))
            ->toDirectory('profile-pictures')
            ->useFilename($user->name)
            ->upload();

        $user->attachMedia($new_profile_picture, 'profile-pictures');

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Profile picture update',
            ]);
        }
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

        return response()->json([
            'message' => 'Password updated! Please login again',
        ]);
    }


    /**
     * Retrieves default profile image
     *
     * @return string
     */
    public function defaultProfilePicture()
    {
        return 'global_assets/images/placeholders/placeholder.jpg';
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function markNotificationAsRead($id)
    {
        return auth()->user()->notifications->first()->markAsRead();

    }
}
