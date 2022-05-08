<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Suburb;
use App\Models\Dependent;
use App\Models\MainMember;
use App\Models\MedicalAid;
use App\Models\MedicalPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $users)
    {
        $user_id = Auth::user()->id;

        return view('user.profile', [
            'user_id' => Auth::user()->id,
            'suburbs' => Suburb::all(),
            'medical_aids' => MedicalAid::all(),
            'medical_plans' => MedicalPlan::all(),
            'dependents' => Dependent::where('main_member_id', $user_id)->paginate(5),

            'addressLine1' => MainMember::where('main_member_id', $user_id)->pluck('addressLine1')->first(),
            'addressLine2' => MainMember::where('main_member_id', $user_id)->pluck('addressLine2')->first(),
            'phone' => MainMember::where('main_member_id', $user_id)->pluck('contact_number')->first(),
            'medical_aid_no' => MainMember::where('main_member_id', $user_id)->pluck('medical_aid_no')->first(),
            'medical_aid_YN' => MainMember::where('main_member_id', $user_id)->pluck('medical_aid_YN')->first(),

            'suburb_name' => MainMember::where('main_member_id', $user_id)
                ->join('suburbs', 'main_members.suburb_id', '=', 'suburbs.id')
                ->select('suburbs.name')->pluck('name')->first(),

            'zipcode' => MainMember::where('main_member_id', $user_id)
                ->join('suburbs', 'main_members.suburb_id', '=', 'suburbs.id')
                ->select('suburbs.zipCode')->pluck('zipCode')->first(),

            'medical_plan' => MainMember::where('main_member_id', $user_id)
                ->join('medical_plans', 'main_members.medical_plan_id', '=', 'medical_plans.id')
                ->select('medical_plans.plan_name')->pluck('plan_name')->first(),

                'user'  => User::find(Auth::user()->id)
        ]);
    }
}
