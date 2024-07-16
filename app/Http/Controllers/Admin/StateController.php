<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(){
        $pageTitle = 'States';
        $countries = Country::orderBy('name','asc')->get();

        $states = State::orderBy('state','asc')->paginate(5);
        return view('admin.state.index', compact('pageTitle','states','countries'));
    }
    public function store(Request $request){
        $request->validate(['state'=> 'required| unique:states,state,']);

        $store = new State;

        $store->state = $request->state;
        $store->country_id = $request->country_id;
        $store->save();

        $notify[] = ['success', 'State has been created successfully'];
        return back()->withNotify($notify);
    }
    public function update(Request $request, $id){
        $request->validate([
            'state' => 'required|unique:states,state,' . $id,
            'country_id' => 'required|exists:countries,id'
        ]);

        $update = State::find($id);

        $update->state = $request->state;
        $update->country_id = $request->country_id;
        $update->save();

        $notify[] = ['success', 'State has been updated successfully'];
        return back()->withNotify($notify);
    }
    public function delete(Request $request){
        $delete = State::find($request->id);
        District::where('state_id',$request->id)->delete();
        $delete->delete();

        $notify[] = ['success', 'State has been deleted successfully'];
        return back()->withNotify($notify);
    }
}
