<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Nurse;
use App\Models\Suburb;
use App\Models\Favourite;
use App\Models\TestResult;
use App\Models\TestBooking;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        return view(
            'nurses.nurse_index',
            [
                'fav_suburb' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.name',)
                    ->get(),

                'fav_suburb_request' => TestRequest::select('test_requests.*')
                    ->join('suburbs', 'test_requests.suburb_id', '=', 'suburbs.id')
                    ->where('suburbs.id',)
                    ->get(),

                'test_logsTomorrow' => TestBooking::where('nurse_id', $user_id)
                    ->join('users', 'test_bookings.nurse_id', '=', 'users.id')
                    ->where('test_bookings.status', 'Scheduled')
                    ->whereDate('date', Carbon::tomorrow())
                    ->select('test_bookings.*')
                    ->orderBy('time_slot')
                    ->get(),

                'pendingRequests' => TestRequest::where('status', 'New')->count(),

                'todaysSchedule' => TestBooking::where('nurse_id', $user_id)
                    ->where('Status', 'Scheduled')
                    ->whereDate('date', today())
                    ->orderBy('time_slot')
                    ->get(),

                'todaysScheduleCount' => TestBooking::where('nurse_id', $user_id)
                    ->where('Status', 'Scheduled')
                    ->whereDate('date', today())->count(),

                'totalKit' => TestBooking::where('test_bookings.nurse_id', $user_id)
                    ->where('test_bookings.Status', 'Scheduled')
                    ->whereDate('date', today())
                    ->join('test_requests', 'test_bookings.testRequest_id', '=', 'test_requests.id')
                    ->sum('number_of_people'),

                'requests' => TestRequest::where('status', 'New')->get(),
                'requestscount' => TestRequest::all()->count(),
                'test_results' => TestResult::where('test_results.test_request_id', $user_id)
            ]
        );
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
        $validateData = $request->validate([
            'date' => ['required', 'after_or_equal:' . now()->format('d-m-Y'), 'before_or_equal:tomorrow'],
            'time_slot' => 'required',
            'nurse_id' => 'required',
            'testRequest_id' => 'required',
            'Status' => 'required',
        ]);

        //dd($validateData);

        $testBooking = TestBooking::create($validateData);
        return redirect()->route('admins.index')
            ->with('success', 'The nurse is assigned successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse, $id)
    {
        $user_id = Auth::user()->id;

        return view('request.edit', [
            'test_booking' => TestRequest::find($id),
            'requests' => TestRequest::all(),
            'test_requests' => Nurse::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = TestRequest::find($id);
        $testR->update($request->all());

        return view(
            'admins.assign_nurse',
            [
                'test_booking' => TestRequest::find($id),
                'nurses' => User::whereHas('roles', function ($query) {
                    $query->where('name', 'Nurse');
                })->get(),
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
    }
}
