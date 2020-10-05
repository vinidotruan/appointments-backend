<?php

namespace App\Http\Controllers;

use App\File;
use App\Patient;
use Illuminate\Http\Request;

class FileController extends Controller
{
    
    public function upload(Request $request)
    {
        $files = $request->file('files');
        $uploadedFiles = [];

        foreach ($files as $key => $file) {
            $filename =  str_replace(' ', '', $file->getClientOriginalName());
            $date = date('Y-m-d');
            $extension = $file->extension();

            $path = asset('storage/'.$file->store('attachments', ['disk' => 'public']));

            $uploadedFiles[] = File::create([
                "name" => $filename,
                "path" => $path,
                "type" => $extension
            ]);
        }

        return response()->json($uploadedFiles);
    }

    public function attachToPatient(File $file, Patient $patient)
    {
        $file->patients()->attach($patient->id);
        return response()->json(['message' => 'Attached']);
    }

    public function index()
    {
        return response()->json(File::all());
    }

    public function listByPatient(Patient $patient)
    {
        return response()->json($patient->files);
    }
}
