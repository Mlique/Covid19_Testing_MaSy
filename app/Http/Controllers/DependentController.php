<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Suburb;
use App\Models\Dependent;
use App\Models\MedicalAid;
use App\Models\MedicalPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependents = Dependent::latest()->paginate(5);
        return view('dependents.index',compact('dependents'))
            ->with('1', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependents.create',

        [
            'cities' => City::all(),
            'suburbs' => Suburb::all(),
            'medical_aids' => MedicalAid::all(),
            'medical_plans' => MedicalPlan::all(),
        ]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'id_number' => 'required|min:13',
            'contact_number' => 'required|numeric|min:10',
            'email_address' => 'required',
            'suburb_id' => 'required',
            'medical_aid' => '',
            'medical_plan_id' => '',
            'medical_aid_no' => '',
            'main_member_id' => 'required',
        ]);

        Dependent::create($request->all());

        return redirect()->route('user.profile')
        ->with('success', 'Dependent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dependent $dependent)
    {
        $suburbs = Suburb::all();
        $medical_aids = MedicalAid::all();
        $medical_plans = MedicalPlan::all();
        return view('dependents.show',compact('dependent', 'suburbs', 'medical_plans', 'medical_aids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependent $dependent)
    {
        return view('dependents.edit',compact('dependent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependent $dependent)
    {
        $request->validate([

        ]);

        $dependent->update($request->all());

        return redirect()->route('user.profile')
            ->with('success', 'Dependent details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependent $dependent)
    {
        $dependent->delete();

        return redirect()->route('user.profile')
            ->with('success', 'Dependent deleted successfully.');
    }
}
