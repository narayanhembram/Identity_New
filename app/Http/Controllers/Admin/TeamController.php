<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function list()
    {
        $pageTitle = 'Teams';
        return view('admin.team.list', compact('pageTitle'));
    }
    public function Add()
    {
        $pageTitle = 'Add new member';
        return view('admin.team.add', compact('pageTitle'));
    }
}
