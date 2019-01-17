<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers\Frontend;

use App\Models\Department;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index()
    {
        return view('Frontend.Documents.index');
    }

    public function getDocuments()
    {
        $departments = Department::with('media')->has('media')->paginate(10);

        return response()->json($departments);
    }
}
