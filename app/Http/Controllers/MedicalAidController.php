<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\MedicalAid;
use App\Models\MedicalPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalAidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_aids = MedicalAid::latest()->paginate(5);
        return view('medical_aids.index',

        [
            'users' => Auth::user()->id,
            'medical_plans' => MedicalPlan::all(),
        ],

        compact('medical_aids'))
            ->with('1', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_aids.create',

        [
            'users' => Auth::user()->id,
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
        $request->validate([
            'aid_name' => 'required',
            'medical_plan_id' => 'required',
            'medical_aid_no' => 'required',
        ]);

        TestRequest::create($request->all());

        return redirect()->route('medical_aids.index')
            ->with('success', 'Billing info created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalAid $medicalAid)
    {
        return view('medical_aids.show',

        compact('testRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalAid $medicalAid)
    {
        return view('testRequests.edit',

        [

            'dependents'=> Dependent::all(),
        ],

        compact('testRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalAid $medicalAid)
    {
        $request->validate([

        ]);

        $testRequest->update($request->all());

        return redirect()->route('testRequests.index')
            ->with('success', 'Request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalAid  $medicalAid
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalAid $medicalAid)
    {
        $testRequest->delete();

        return redirect()->route('testRequests.index')
            ->with('success', 'Request deleted succesfully.');
    }
}
