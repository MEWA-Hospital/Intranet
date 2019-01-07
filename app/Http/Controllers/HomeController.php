<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use App\Models\Events;
use Yajra\DataTables\DataTables;

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

    public function upcomingEventsDataTable()
    {
        $upcomingEvents = Events::upcoming()->with('department')->get();

        return DataTables::of($upcomingEvents)
            ->editColumn('name', function ($event) {
                return '<div class="d-flex align-items-center">
                            <div class="mr-3">
                                <a href="#">
                                    <img
                                        src="'. asset('global_assets/images/placeholders/placeholder.jpg').'"
                                        class="rounded-circle" width="32" height="32"
                                        alt="">
                                </a>
                            </div>
                            <div>
                                <a href="'. route('frontend.events.show', $event->id).'"
                                   class="text-default font-weight-semibold"> ' . $event->name . '</a>
                                <div class="text-muted font-size-sm">
                                    <span class="icon-calendar text-pink mr-1"></span>
                                    '. $event->start_date->format('F j, Y. H:i:s') .'
                                </div>
                            </div>
                        </div>';
            })
            ->rawColumns(['name'])
            ->make(true);
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

        return view('Frontend.dashboard', compact('upcomingEvents'));
    }
}
