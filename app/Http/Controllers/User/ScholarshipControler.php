<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipControler extends Controller
{
    public function index()
    {
        $pageTitle = 'Scholarship';
        $scholarship = Scholarship::orderBy('id','asc')->get();
        return view('presets.themesFive.user.scholarship.scholarship', compact('pageTitle','scholarship'));

    }

    public function getType(Request $request)
    {
        $getType = Scholarship::where('type', $request->type)->get();
        return response()->json($getType);
    }

    public function getClass(Request $request)
    {
        $getClass = Scholarship::where('class', $request->classes)->get();
        return response()->json($getClass);
    }
}
