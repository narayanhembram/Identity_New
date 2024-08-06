<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterclassController extends Controller
{
    public function list(){
        $pageTitle = 'Master Class';
        $categories = Category::all();
        return view('presets.themesFive.user.master-class.category', compact('categories','pageTitle'));
    }
    public function subcategory($id){
        $categories = Category::find($id);
        $pageTitle = $categories->title;
        $subcategories = Subcategory::where('category_id', $id)->get();
        return view('presets.themesFive.user.master-class.subcategory',compact('pageTitle','subcategories', 'categories'));
    }
    public function view($id){
        
    }
}
