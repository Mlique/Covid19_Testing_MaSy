<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Suburb;
use App\Models\Dependent;
use App\Models\Favourite;
use App\Models\TestResult;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestRequestController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $testRequests = TestRequest::where('requestor_id', $user_id)->get();

        return view('testRequests.index',
        [
            'users' => Auth::user()->id,
            'suburbs' => Suburb::all(),
            'dependents' => Dependent::all(),
            'testRequests' => TestRequest::where('requestor_id', $user_id)->get()
        ],

        compact('testRequests'))
            ->with('1', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $user_id = Auth::user()->id;

        return view('testRequests.create',

        [
            'users' => Auth::user()->id,
            'suburbs' => Suburb::all(),
            'dependents'=> Dependent::where('main_member_id', $user_id)->get(),

        ]);
    }


    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'requestor_id'      => 'required',
            'suburb_id'      => 'required',
            'addressLine1'      => 'required',
        ]);

        foreach ($request->input('subjectTest') as $subjectTestId) {
            DB::table('test_requests')->InsertGetId([

                'addressLine1'      => request('addressLine1'),
                'addressLine2'      => request('addressLine2'),
                'suburb_id'         => request('suburb_id'),
                'requestor_id'      => request('requestor_id'),
                'number_of_people' => request('number_of_people'),
                'status'            => request('status'),
                'test_subject_id'   => $subjectTestId,

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
        }

        return redirect()->route('testRequests.index')
            ->with('success', 'Request created successfully.');
    }


    public function show($id)
    {
        $user_id = Auth::user()->id;

        return view('test_bookings.accept',
        [
            'test_booking' => TestRequest::find($id),

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
            ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            ->select('suburbs.name', )
            ->get(),
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        return view('test_bookings.accept',
        [
            'test_booking' => TestRequest::find($id),

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
            ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            ->select('suburbs.name', )
            ->get(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $testR = TestRequest::find($id);
        $testR->update($request->all());

        return view('test_bookings.accept',
        [
            'test_booking' => TestRequest::find($id),

            'fav_suburb' => Favourite::where('nurse_id', $user_id)
            ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
            ->select('suburbs.name', )
            ->get(),
        ]);
    }


    public function destroy(TestRequest $testRequest)
    {
        $testRequest->delete();

        return redirect()->route('testRequests.index')
            ->with('success', 'Request cancelled succesfully.');
    }
}
