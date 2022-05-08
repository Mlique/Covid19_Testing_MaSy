<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableUpdateController extends Controller
{
    function action(Request $request)
    {
        if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$test_Bookings = array(
    				'date'	        =>	$request->date,
    				'time_slot'		=>	$request->time_slot,
    				'Status'		=>	$request->Status
    			);
    			DB::table('test_bookings')
    				->where('id', $request->id)
    				->update($test_Bookings);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('test_bookings')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
}
