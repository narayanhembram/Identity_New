<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MasterClass;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterclassController extends Controller
{
    public function list(){
        $pageTitle = 'Master Class';
        $masterclass = MasterClass::select('title')->distinct()->get();
        $video = MasterClass::all();
        // dd($masterclass);
        return view('presets.themesFive.user.master-class.view', compact('masterclass','pageTitle','video'));
    }

    public function get_videos(Request $request)
    {
        // dd($request->all());
        $videos = MasterClass::where('title',$request->Title)->get();
        return response()->json($videos);
    }
}
