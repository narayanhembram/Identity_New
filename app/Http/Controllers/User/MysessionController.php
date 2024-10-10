<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mysession;
use App\Models\Subcategory;
use App\Models\Team;
use Illuminate\Http\Request;

class MysessionController extends Controller
{
    public function index()
    {
        $pageTitle = 'My Session';
        $mysession = Team::all();
        $category = Category::all();
        return view('presets.themesFive.user.my-sessions.team', compact('pageTitle','mysession','category'));
    }

    public function get_team_by_category(Request $request)
    {
        $category = Team::where('category_id',$request->cat_id)->get();
        $subcategory = Subcategory::where('category_id',$request->cat_id)->get();
        return response()->json([
            'category' => $category,
            'subcategory' => $subcategory,
        ]);
    }

    public function get_team_by_subcategory(Request $request)
    {
        $subcategory = Team::where('sub_category_id',$request->subcat_id)->get();
        return response()->json($subcategory);
    }

    public function get_team(Request $request){
        $get_team = Team::where('name', $request->name)->get();
        return response()->json($get_team);
    }
    public function viewTeam($id){
        $pageTitle = 'View Team';
        $view_team = Team::find($id);
        return view('presets.themesFive.user.my-sessions.view_team', compact('view_team','pageTitle'));
    }
}
