<?php

namespace App\Http\Controllers;

use App\Models\Suburb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SuburbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fav_suburbs = DB::table('favourites')
        ->join('users', 'users.id', '=', 'favourites.nurse_id')
        ->join('suburbs', 'suburbs.id', '=', 'favourites.suburb_id')
        ->select('favourites.*', 'users.first_name', 'users.last_name', 'suburbs.name')
        ->get();

        return view('admins.nurse_suburb',compact('fav_suburbs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function show(Suburb $suburb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function edit(Suburb $suburb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suburb $suburb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suburb  $suburb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suburb $suburb)
    {
        //
    }
}
