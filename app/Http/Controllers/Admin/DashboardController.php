<?php

namespace Thd\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Thd\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getCountryState(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required|max:3|alpha'
        ]);

        $countries = new Countries();
        $states = $countries->where('cca3', $request->input('country'))->first()->hydrateStates()->states->pluck('name', 'postal');
        return response()->json($states);
    }
}
