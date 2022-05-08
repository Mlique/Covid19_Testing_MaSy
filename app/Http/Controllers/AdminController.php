<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Favourite;
use App\Models\TestBooking;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
            'admins.admin_index',
            [
                'fav_suburb' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.name',)
                    ->get(),

                'requests' => TestRequest::all(),
                'requestscount' => TestRequest::all()->count(),
                'pendingRequests' => TestRequest::where('status', 'New')->count(),
                'pendingRequestsTotal' => TestRequest::where('status', 'New')->get(),
                'todaysScheduleTotal' => TestBooking::where('Status', 'Scheduled')->count(),
                'performedreques' => TestBooking::where('Status', 'Performed'),

                'todaysSchedule' => TestBooking::where('Status', 'Scheduled')
                    ->whereDate('date', today())->get(),

                'todaysPerformed' => TestBooking::where('Status', 'Performed')
                    ->whereDate('date', today())->get(),

                'todaysPerformed_count' => TestBooking::where('Status', 'Performed')
                    ->whereDate('date', today())->count(),

                'todaysSchedule_count' => TestBooking::where('Status', 'Scheduled')
                    ->whereDate('date', today())->count(),

                'todaysSchedule_get' => TestBooking::where('Status', 'Scheduled')
                    ->whereDate('date', today())->get(),

                // 'rangeCheck' => TestBooking::where('date', '>=', $request->from)
                // ->where('date', '<=', $request->to)
                // ->get(),

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
        $from   = $request->from;
        $to     = $request->to;
        $rangeCheck = TestBooking::whereBetween(
            'date',
            [
                $from . ' 00:00:00', $to . ' 23:59:59'
            ]
        )->get();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function records(Request $request)
    {
        //dd($request);
        $user_id = Auth::user()->id;
        $request->validate([
            'fromDate' => 'required',
            'toDate' => 'required',
            'other' => 'required'
        ]);

        $fromDate = $request->input('fromDate');
        $toDate   = $request->input('toDate');
        $other    = $request->input('other');

        $performedreques =  DB::table('test_bookings')
        ->join('users', 'users.id', '=', 'test_bookings.nurse_id')
        ->join('test_requests', 'test_bookings.testRequest_id', '=', 'test_requests.id')
        ->where('test_bookings.Status', 'Performed')
        ->where('date', '>=', $fromDate)
        ->where('date', '<=', $toDate)
        ->orWhere('users.first_name', 'LIKE', '%' . $other . '%')
        ->orWhere('users.last_name', 'LIKE', '%' . $other . '%')
        ->orWhere('test_bookings.Status', 'LIKE', '%' . $other . '%')
        ->select(
            'test_bookings.*',
            'users.last_name',
            'users.first_name',
            'test_requests.addressLine1',
            'test_requests.addressLine2',

        )
        ->get();

        return view('admins.admin_index', [

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
            ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            ->select('suburbs.name',)
            ->get(),

        'requests' => TestRequest::all(),
        'requestscount' => TestRequest::all()->count(),
        'pendingRequests' => TestRequest::where('status', 'New')->count(),
        'pendingRequestsTotal' => TestRequest::where('status', 'New')->get(),
        'todaysScheduleTotal' => TestBooking::where('Status', 'Scheduled')->count(),
        'performedreques' => TestBooking::where('Status', 'Performed'),

        'todaysSchedule' => TestBooking::where('Status', 'Scheduled')
            ->whereDate('date', today())->get(),

        'todaysPerformed' => TestBooking::where('Status', 'Performed')
            ->whereDate('date', today())->get(),

        'todaysPerformed_count' => TestBooking::where('Status', 'Performed')
            ->whereDate('date', today())->count(),

        'todaysSchedule_count' => TestBooking::where('Status', 'Scheduled')
            ->whereDate('date', today())->count(),

        'todaysSchedule_get' => TestBooking::where('Status', 'Scheduled')
            ->whereDate('date', today())->get(),
        ], compact('performedreques'));
    }
}
