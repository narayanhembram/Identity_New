<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Institution;
use App\Models\Module;
use App\Models\Path;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $pageTitle = 'Category';
        $categories = Category::orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.category.list',compact('pageTitle','categories'));
    }
    public function add(){
        $pageTitle = 'Add Category';
        // $modules = Module::all();
        return view('admin.category.add', compact('pageTitle'));
    }
    public function store(Request $request){
        $store = new Category;
        // $store->module_id = $request->module_id;
        $store->title = $request->title;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = time().'_' . $file->getClientOriginalName();
            $file->move(public_path('Category'),$fileName);
            $store->file = $fileName;
        }
        $store->description = $request->description;
        $store->save();

        $notify[] = ['success', 'Category has been created successfully'];
        return to_route('admin.category.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Category';
        // $modules = Module::all();
        $edit = Category::find($id);
        return view('admin.category.edit', compact('pageTitle','edit'));
    }
    public function update(Request $request){
        $update = Category::find($request->id);
        // $update->module_id = $request->module_id;
        $update->title = $request->title;

        if($request->hasFile('file')){
            if($update->file && file_exists(public_path('Category/' . $update->file))){
                unlink(public_path('Category/' . $update->file));
            }
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Category'), $fileName);
            $update->file = $fileName;
        }

        $update->description = $request->description;
        $update->save();

        $notify[] = ['success', 'Category has been updated successfully'];
        return to_route('admin.category.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Category::find($request->id);
        if ($delete) {
            if ($delete->file && file_exists(public_path('Category/' . $delete->file))) {
                unlink(public_path('Category/' . $delete->file));
            }
            Subcategory::where('category_id',$request->id)->delete();
            Entrance::where('category_id',$request->id)->delete();
            Path::where('category_id',$request->id)->delete();
            Institution::where('category_id',$request->id)->delete();
            $delete->delete();
            $notify[] = ['success','Category has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Category not found'];
        }
        return back()->withNotify($notify);
    }
}
