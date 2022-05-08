<?php

namespace App\Http\Controllers;

use App\Models\Suburb;
use App\Models\Favourite;
use App\Mail\NotifyRequest;
use App\Models\TestBooking;
use App\Models\TestRequest;
use Illuminate\Http\Request;
use App\Rules\appointmentOverlap;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        return view('test_bookings.index',
            [
                'fav_suburb' => Favourite::where('nurse_id', $user_id)
                    ->join('suburbs', 'favourites.suburb_id', '=', 'suburbs.id')
                    ->select('suburbs.name', )
                    ->get(),

                'test_Bookings' => TestBooking::where('nurse_id', $user_id)
                ->where('test_bookings.status', 'Scheduled')
                ->select('test_bookings.*')->paginate(5),
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
        //dd($request);
        $validateData = $request->validate([
            'date' => ['required', 'after_or_equal:' .now()->format('d-m-Y') , 'before_or_equal:tomorrow'],
            'time_slot' => 'required',
            'nurse_id' => 'required',
            'testRequest_id' => 'required',
            'Status' => 'required',
        ]);

        $testBooking = TestBooking::create($validateData);
        $data = ['scheduled' => $request->input('date') . ' ' . $request->input('time_slot')];
        Mail::to($request->email)->send(new NotifyRequest($data));

        if (!$testBooking) {
            $request->session()->flash('error', 'You cannot make a booking for this date and time');
            return redirect(route('admin.users.index'));
        }


        return redirect()->route('schedular.index')
            ->with('success', 'Test Booking schuduled successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestBooking  $testBooking
     * @return \Illuminate\Http\Response
     */
    public function show(TestBooking $testBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestBooking  $testBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(TestBooking $testBooking, $id)
    {
        $user_id = Auth::user()->id;

        return view('request.edit', [
            'test_booking' => TestRequest::find($id),
            'requests' => TestRequest::all(),

            'suburbs' => Suburb::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestBooking  $testBooking
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestBooking  $testBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove = TestBooking::find($id);
        $remove->delete();
        return response()->json(['success' => 'success']);
    }
}
