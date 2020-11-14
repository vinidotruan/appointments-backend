<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->page && $request->page == -1) {
            return response()->json(
                Appointment::with('patient')->orderBy('date', 'DESC')->get()
            );
        }
        return response()->json(
            Appointment::with('patient')->orderBy('date', 'DESC')->paginate(15)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = Appointment::create($request->all());
        return response()->json($appointment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return response()->json(Appointment::find($appointment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update($request->all());
        $appointment->save();

        return response()->json($appointment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'deleted']);
    }

    public function fetchByPatient($id)
    {
        return response()->json(Appointment::where("patient_id", $id)->get());
    }

    public function todaysAppointments()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return response()->json(Appointment::with('patient')->where("date", date("Y-m-d"))->get());
    }

    public function madeAppointments()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return response()->json(Appointment::where("date", "<", date("Y-m-d"))->count());
    }
}
