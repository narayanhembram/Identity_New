<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function list(){
        $pageTitle = 'Entrance Exam';
        $entrances = Entrance::orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.entrance-exam.list', compact('pageTitle','entrances'));
    }
    public function add(){
        $pageTitle = 'Add Entrance Exam';
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.entrance-exam.add', compact('pageTitle','categories','subcategories'));
    }
    public function store(Request $request){
        $store = new Entrance();
        $store->category_id = $request->category_id;
        $store->subcategory_id = $request->subcategory_id;
        $store->exam_name = $request->exam_name;
        $store->issue_date = $request->issue_date;
        $store->url = $request->url;

        $store->save();

        $notify[] = ['success', 'Entrance Exam has been created successfully'];
        return to_route('admin.entrance.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Entrance Exam';
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $edit = Entrance::find($id);
        return view('admin.entrance-exam.edit', compact('pageTitle','edit','categories','subcategories'));
    }
}
