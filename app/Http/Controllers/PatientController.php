<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Address;
use App\PlusInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->page && $request->page == -1) {
            return response()->json(Patient::orderBy('name')->get());
        }
        return response()->json(Patient::orderBy('name')->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->user,[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('email')) {
                return response()->json(['message' => $errors], 422);
            }

            return response()->json(['message' => $errors], 500);
        }

        $user = new User([
            'name' => $request->user['name'],
            'email' => $request->user['email'],
            'password' => bcrypt($request->user['password']),
            'role_id' => $request->user['role_id'],
            'gender_id' => $request->user['gender_id'],
            'value' => $request->user['value'],
        ]);

        $user->save();

        $data = $request->all();
        $data['user_id'] = $user->id;
        $patient = Patient::create($data);
        $address = $request->address;
        $address['patient_id'] = $patient->id;
        $address = Address::create($address);
        return response()->json($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return response()->json([
            "patient" => Patient::find($patient->id),
            "user" => User::where("id", "=", $patient->user_id),
            "address" => Address::where("patient_id", "=", $patient->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        if($patient->addresses()) {
            $patient->addresses()->update($request->addresses);
            $patient->addresses->save();
        } else {
            $newAddres = Address::create($request->address);
        }

        if($patient->plusInformations()) {
            $patient->plusInformations()->update($request->plusInformations);
            $patient->plusInformations->save();
        } else {
            $newPlusInformation =  PlusInformation::create($request->plusInformations);
        }

        $usersInfos = $request->user;
        
        $usersInfos['password'] = $request->user['password'] ? 
        bcrypt($request->user['password']) : 
        $patient->user->password;

        $patient->update($request->all());
        $patient->save();

        $patient->user()->update($usersInfos);
        $patient->user->save();

        return response()->json($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message' => 'deleted']);
    }

    public function search(Request $request) {        
        $value = $request->value;
        $patient = Patient::where('name', 'like', "%{$value}%")->paginate(15);
        
        return response()->json($patient);
    }
}
