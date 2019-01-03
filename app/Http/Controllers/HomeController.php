<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $upcomingEvents = Events::upcoming()->get();

        $employee = auth()->user()->employee;
        if ($employee) {
            $department = $employee->department;

            $sop = $department->getMedia('sop');
            $charter = $department->getMedia('charter');
            $mission = $department->getMedia('mission');

            $documents = collect([$sop, $charter, $mission]);
        } else {
            $documents = null;
        }
        if (auth()->user()->employee) {
            $biometricInOutDetails = \DB::connection('otl')
                ->table('Emp_InOut_Record')
                ->select(['Emp_Id', 'For_Date', 'In_Out_Flag', 'In_Duration'])
                ->limit(10)
                ->where('Emp_Id', auth()->user()->employee->biometric_code)
                ->orderBy('For_Date', 'desc')
                ->get();

            $biometricInOutDetails->map(function ($detail) {
                $detail->For_Date = date('Y-m-d H:s:i', strtotime($detail->For_Date));
                $detail->For_Date = Carbon::parse($detail->For_Date)->format('M j Y,  H:s:i');

                if ($detail->In_Out_Flag === 'I') {
                    $detail->In_Out_Flag = 'Check in';
                } else {
                    $detail->In_Out_Flag = 'Check out';
                }
            });
        } else {
            $biometricInOutDetails = '';
    }

        return view('Frontend.dashboard', compact('upcomingEvents', 'documents', 'biometricInOutDetails'));
    }


}
