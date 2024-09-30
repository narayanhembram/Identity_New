<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function list()
    {
        $pageTitle = 'Teams';
        $teams = Team::all();
        return view('admin.team.list', compact('pageTitle', 'teams'));
    }
    public function Add()
    {
        $pageTitle = 'Add new member';
        $categories = Category::all();
        return view('admin.team.add', compact('pageTitle','categories'));
    }

    public function Store(Request $request)
    {
        $store = new Team();
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'specialization' => 'required',
            'permanent_address' => 'required',
            'current_address' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'joining_date' => 'required',
            'emergency_contact' => 'required',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Teams'), $photoName);
            $store->photo = $photoName;
        }
        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesName = time() . '_' . $certificates->getClientOriginalName();
            $certificates->move(public_path('Teams'), $certificatesName);
            $store->certificates = $certificatesName;
        }
        $store->category_id = $request->category_id;
        $store->sub_category_id = $request->sub_category_id;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->education = $request->education;
        $store->experience = $request->experience;
        $store->specialization = $request->specialization;
        $store->permanent_address = $request->permanent_address;
        $store->current_address = $request->current_address;
        $store->father_name = $request->father_name;
        $store->mother_name = $request->mother_name;
        $store->dob = $request->dob;
        $store->gender = $request->gender;
        $store->nationality = $request->nationality;
        $store->religion = $request->religion;
        $store->joining_date = $request->joining_date;
        $store->emergency_contact = $request->emergency_contact;
        $store->status = $request->input('status', 0);
        $store->description = $request->description;
        $store->save();

        $notify[] = ['success', 'Member has been created successfully'];
        return to_route('admin.team.list')->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Member';
        $edit = Team::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.team.edit', compact('edit', 'pageTitle','categories','subcategories'));
    }

    public function update(Request $request)
    {
        $update = Team::find($request->id);
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'specialization' => 'required',
            'permanent_address' => 'required',
            'current_address' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'joining_date' => 'required',
            'emergency_contact' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('Teams'), $photoName);
            $update->photo = $photoName;
        }
        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesName = time() . '_' . $certificates->getClientOriginalName();
            $certificates->move(public_path('Teams'), $certificatesName);
            $update->certificates = $certificatesName;
        }
        $update->category_id = $request->category_id;
        $update->sub_category_id = $request->sub_category_id;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->education = $request->education;
        $update->experience = $request->experience;
        $update->specialization = $request->specialization;
        $update->permanent_address = $request->permanent_address;
        $update->current_address = $request->current_address;
        $update->father_name = $request->father_name;
        $update->mother_name = $request->mother_name;
        $update->dob = $request->dob;
        $update->gender = $request->gender;
        $update->nationality = $request->nationality;
        $update->religion = $request->religion;
        $update->joining_date = $request->joining_date;
        $update->emergency_contact = $request->emergency_contact;
        $update->status = $request->status;
        $update->description = $request->description;
        $update->save();

        $notify[] = ['success', 'Member has been updated successfully'];
        return to_route('admin.team.list')->withNotify($notify);
    }

    public function delete(Request $request)
    {
        $delete= Team::find($request->id);
        if($delete){
            $delete->delete();
            $notify[] = ['success', 'Member has been Deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'Something wents wrong.'];
            return back()->withNotify($notify);
    }
}
