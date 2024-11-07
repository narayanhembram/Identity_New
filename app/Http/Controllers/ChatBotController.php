<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chatbot;
use App\Models\Module;
use App\Models\Scholarship;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function getModule(Request $request){
        $specificModuleIds = [14, 18, 21, 19];
        $modules = Module::whereIn('id', $specificModuleIds)->get();
        return response()->json($modules);
    }
    public function get_category(Request $request){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function get_subcategory(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }
    public function getScolarship(Request $request){
        $scoholarships = Scholarship::all();
        return response()->json($scoholarships);
    }
    public function storeUser(Request $request){
        $request->validate([
            'u_name' => 'required|string|max:255',
            'number' => 'required|digits_between:10,15',
        ]);
        $store =new Chatbot;
        $store->u_name = $request->u_name;
        $store->number = $request->number;
        $store->save();
        return response()->json($store);
    }

}
