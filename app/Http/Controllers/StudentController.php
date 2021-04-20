<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        // $response = Http::get('')
        return response()->json([
            'success' => 'true'
        ]);
    }

    public function test()
    {
        return response()->json([
            'success' => 'true'
        ]);
    }
}
