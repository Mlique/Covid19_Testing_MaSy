<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\LabUser;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Models\TestResult;
use App\Models\TestBooking;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testResults = TestResult::where('Status', 'Scheduled');
        return view('captures.index', compact('testResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'captures.create',

            [
                'test_requests' => TestRequest::all(),
                'users' => Auth::user()->id,
                'lab_users' => LabUser::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'temperature' => 'required|numeric',
            'blood_pressure' => 'required',
            'oxygen_levels' => 'required',
            'request_id' => '',
            'nurse_id' => '',
        ]);

        $barcode = Helper::IDGenerator(new TestResult, 'barcode', 5, '0000');
        //$test_result_PN = $request->test_result;
        $temperature = $request->temperature;
        $blood_pressure = $request->blood_pressure;
        $oxygen_levels = $request->oxygen_levels;
        $testRequest_id = $request->testRequest_id;
        $nurse_id = $request->nurse_id;
        $patient_id = $request->patient_id;

        $results = new TestResult;
        $results->barcode = $barcode;
        $results->temperature = $temperature;
        $results->blood_pressure = $blood_pressure;
        $results->oxygen_levels = $oxygen_levels;
        $results->testRequest_id = $testRequest_id;
        $results->nurse_id = $nurse_id;
        $results->patient_id = $patient_id;

        $results->save();

        return redirect()->route('schedular.index')
            ->with('success', 'Request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;

        return view('captures.create', [
            'log' => TestBooking::find($id),
            'dependents' => Dependent::all(),
            'users' => User::all(),

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
                ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                ->select('suburbs.name',)
                ->get(),

            'fav_suburb_request' => TestRequest::select('test_requests.*')
                ->join('suburbs', 'test_requests.suburb_id', '=', 'suburbs.id')
                ->where('suburbs.id',)
                ->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function edit(TestResult $testResult, $id)
    {
        return view(
            'captures.edit',
            [
                'dependents' => Dependent::all(),
            ],
            compact('testResults')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testResults = TestBooking::find($id);
        $testResults->update($request->all());

        return view('captures.create', [
            'log' => TestBooking::find($id),
            'dependents' => Dependent::all(),
            'users' => User::all(),

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
                ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                ->select('suburbs.name',)
                ->get(),

            'fav_suburb_request' => TestRequest::select('test_requests.*')
                ->join('suburbs', 'test_requests.suburb_id', '=', 'suburbs.id')
                ->where('suburbs.id',)
                ->get(),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestResult  $testResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResult $testResult)
    {
        //
    }
}
