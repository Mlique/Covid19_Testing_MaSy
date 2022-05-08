<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Suburb;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Models\TestBooking;
use App\Models\TestRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $performedreques =  DB::table('test_bookings')
        ->where('test_bookings.Status', 'Performed')
        ->join('users', 'users.id', '=', 'test_bookings.nurse_id')
        ->join('test_requests', 'test_bookings.testRequest_id', '=', 'test_requests.id')
        ->select(
            'test_bookings.*',
            'users.last_name',
            'users.first_name',
            'test_requests.addressLine1',
            'test_requests.addressLine2',)
        ->get();

        if (Gate::allows('is-admin')) {
            return view(
                'admins.admin_index',
                [
                    'dependents' => Dependent::latest()->paginate(5),
                    'requests' => TestRequest::all(),
                    'requestscount' => TestRequest::all()->count(),
                    'pendingRequests' => TestRequest::where('status', 'New')->count(),
                    'pendingRequestsTotal' => TestRequest::where('status', 'New')->get(),
                    'todaysScheduleTotal' => TestBooking::where('Status', 'Scheduled')->count(),

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
                ], compact('performedreques')
            );
        } else
        if (Gate::allows('is-nurse')) {
            return view(
                'nurses.nurse_index',
                [
                    'fav_suburb' => Favourite::where('nurse_id', $user_id)
                        ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                        ->select('suburbs.name',)
                        ->get(),

                    'pendingRequests' => TestRequest::where('status', 'New')->count(),

                    'todaysSchedule' => TestBooking::where('nurse_id', $user_id)
                        ->where('Status', 'Scheduled')
                        ->whereDate('date', today())->get(),

                    'test_logsTomorrow' => TestBooking::where('nurse_id', $user_id)
                        ->join('users', 'test_bookings.nurse_id', '=', 'users.id')
                        ->where('test_bookings.status', 'Scheduled')
                        ->whereDate('date', Carbon::tomorrow())
                        ->select('test_bookings.*')
                        ->orderBy('date', 'asc')
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
                ]
            );
        } else
        if (Gate::allows('is-patient')) {
            return view(
                'patients.patient_index',
                [
                    'dependents' => Dependent::where('main_member_id', $user_id)->paginate(5),
                    'dependents_number' => Dependent::where('main_member_id', $user_id)->count(),
                    'pending_req' => TestRequest::where('Requestor_id', $user_id)->count(),
                    'user' => Auth::user()->id
                ]
            );
        } else {
            return view(
                'patients.patient_index',
                [
                    'dependents' => Dependent::where('main_member_id', $user_id)->paginate(5),
                    'dependents_number' => Dependent::where('main_member_id', $user_id)->count(),
                    'pending_req' => TestRequest::where('Requestor_id', $user_id)->count(),
                    'user' => Auth::user()->id
                ]
            );
        }
    }
}
