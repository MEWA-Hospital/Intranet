<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use Domain\Department\Models\Employee;
use Domain\Department\Models\Event;
use Spatie\MediaLibrary\Models\Media;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
     /**
     * Retrieves datatable records of upcoming records
     *
     * @return mixed
     * @throws \Exception
     */
    public function upcomingEventsDataTable()
    {
        $upcomingEvents = Event::upcoming()->with('department')->get();

        return DataTables::of($upcomingEvents)
            ->editColumn('name', function ($event) {
                return '<div class="d-flex align-items-center">
                            <div class="mr-3">
                                <a href="#">
                                    <img
                                        src="' . asset('global_assets/images/placeholders/placeholder.jpg') . '"
                                        class="rounded-circle" width="32" height="32"
                                        alt="">
                                </a>
                            </div>
                            <div>
                                <a href="' . route('frontend.events.show', $event->id) . '"
                                   class="text-default font-weight-semibold"> ' . $event->name . '</a>
                                <div class="text-muted font-size-sm">
                                    <span class="icon-calendar text-pink mr-1"></span>
                                    ' . $event->start_date->format('F j, Y. H:i:s') . '
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

    /**
     * Shows the user dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $upcomingEvents = Event::upcoming()->get();

        $newEmployees = Employee::NewEmployees()->get();

        $birthdays = Employee::Birthday()->get();

        if (auth()->user()->employee) {

            $department = auth()->user()->employee->department;

            $sop = $department->getMedia('sop');
            $charter = $department->getMedia('charter');
            $mission = $department->getMedia('mission');

            $documentsCollection = collect([$sop, $charter, $mission]);
        }

        return view('Frontend.dashboard', compact(
            'upcomingEvents', 'documentsCollection', 'newEmployees', 'birthdays'
        ));
    }

    /**
     * Downloads department document
     *
     * @param Media $document
     * @return Media
     */
    public function downloadDocument(Media $document)
    {
        return $document;
    }
}
