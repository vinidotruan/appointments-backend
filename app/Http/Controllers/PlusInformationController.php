<?php

namespace App\Http\Controllers;

use App\PlusInformation;
use Illuminate\Http\Request;

class PlusInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(PlusInformation::paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = PlusInformation::create($request->all());
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlusInformation  $plusInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PlusInformation $plusInformation)
    {
        $response = PlusInformation::find($plusInformation->id);
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlusInformation  $plusInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlusInformation $plusInformation)
    {
        $plusInformation->update($request->all());
        $plusInformation->save();

        return response()->json($plusInformation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlusInformation  $plusInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlusInformation $plusInformation)
    {
        $plusInformation->delete();
        return response()->json(['message' => 'deleted']);
    }
}
