<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function list(){
        $pageTitle = 'Modules';
        $modules = Module::orderBy('id','desc')->paginate(getPaginate());
        return view('admin.modules.list', compact('pageTitle','modules'));
    }
    public function add(){
        $pageTitle = 'Add Modules';
        return view('admin.modules.add', compact('pageTitle'));
    }
    public function store(Request $request){
        $store = new Module;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $photoName = time(). '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Modules'),$photoName);
            $store->image = $photoName;
        }
        $store->title = $request->title;
        $store->btn_text = $request->btn_text;
        $store->url = $request->url;
        $store->save();

        $notify[] = ['success', 'Module has been created successfully'];
        return to_route('admin.module.list')->withNotify($notify);
    }
    public function edit($id){
        $pageTitle = 'Edit Modules';
        $edit = Module::find($id);
        return view('admin.modules.edit',compact('edit','pageTitle'));
    }
    public function update(Request $request){
        $update = Module::find($request->id);
        if($request->hasFile('image')){
            if($update->image && file_exists(public_path('Modules/' . $update->image))){
                unlink(public_path('Modules/' . $update->image));
            }
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Modules'), $photoName);
            $update->image = $photoName;
        }
        $update->title = $request->title;
        $update->btn_text = $request->btn_text;
        $update->url = $request->url;
        $update->save();

        $notify[] = ['success', 'Module has been updated successfully'];
        return to_route('admin.module.list')->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = Module::find($request->id);
        if ($delete) {
            if ($delete->image && file_exists(public_path('Modules/' . $delete->image))) {
                unlink(public_path('Modules/' . $delete->image));
            }
            Category::where('module_id', $request->id)->delete();
            $delete->delete();
            $notify[] = ['success', 'Module has been deleted successfully'];
        } else {
            $notify[] = ['error', 'Module not found'];
        }
        return back()->withNotify($notify);
    }
}
