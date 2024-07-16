<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Entrance;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function list()
    {
        $pageTitle = 'Subcategory';
        $subcategories = Subcategory::orderBy('id', 'desc')->paginate(getPaginate());
        return view('admin.subcategory.list', compact('pageTitle', 'subcategories'));
    }
    public function add()
    {
        $pageTitle = 'Add Subcategory';
        $categories = Category::all();
        return view('admin.subcategory.add', compact('pageTitle', 'categories'));
    }
    public function store(Request $request)
    {
        $store = new Subcategory();

        $store->category_id = $request->category_id;
        $store->title = $request->title;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Subcategory'), $fileName);
            $store->file = $fileName;
        }
        $store->description = $request->description;
        $store->save();

        $notify[] = ['success', 'Subcategory has been created successfully'];
        return to_route('admin.subcategory.list')->withNotify($notify);
    }
    public function edit($id)
    {
        $pageTitle = 'Edit Subcategory';
        $categories = Category::all();
        $edit = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('pageTitle', 'edit', 'categories'));
    }
    public function update(Request $request)
    {
        $update = Subcategory::find($request->id);

        $update->category_id = $request->category_id;
        $update->title = $request->title;
        if ($request->hasFile('file')) {
            if ($update->file && file_exists(public_path('Subcategory/' . $update->file))) {
                unlink(public_path('Subcategory/' . $update->file));
            }
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Subcategory'), $fileName);
            $update->file = $fileName;
        }
        $update->description = $request->description;
        $update->save();

        $notify[] = ['success', 'Subcategory has been created successfully'];
        return to_route('admin.subcategory.list')->withNotify($notify);
    }
    public function delete(Request $request)
    {
        $delete = Subcategory::find($request->id);
        if ($delete) {
            if ($delete->file && file_exists(public_path('Subcategory/' . $delete->file))) {
                unlink(public_path('Subcategory/' . $delete->file));
            }
            Entrance::where('subcategory_id',$request->id)->delete();
            $delete->delete();
            $notify[] = ['success', 'Subcategory has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Subcategory not found'];
        }
        return back()->withNotify($notify);
    }
    public function getSubcategory(Request $request){
        $get_subcategory = Subcategory::where('category_id', $request->category_id)->get();

        return response()->json($get_subcategory);
    }
}
