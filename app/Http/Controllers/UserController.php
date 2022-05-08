<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }
    public function saveUser(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:16',
        ]);
        $user = User::create($validatedData);

        $user->main_members()->create([
            'email_address' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        $request->session()->flash('success', 'You have successfully registered! You may log in now');
        return redirect(route('auth'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'contact_number' => 'required|numeric|min:10',
            'id_number' => 'required|min:13',
        ]);
        $user = User::find($id);

        $user->main_members()->update([
            'email_address' => $request->email_address,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'contact_number' => $request->contact_number,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'medical_aid_no' => $request->medical_aid_no,
            'medical_aid_YN' => $request->medical_aid_YN,
            'medical_plan_id' => $request->medical_plan_id,
            'suburb_id' => $request->suburb_id,
        ]);










        // $user = User::find($id);

        // $user->update($request->except(['_token', 'roles']));

        return redirect(route('user.profile'))
        ->with('success', 'Your profile was updated successfully!');
    }
}
