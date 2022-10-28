<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function list()
    {
        $teams = Team::where('companie_id',Auth::user()->companie_id)->get();
        return view('teams/all',compact('teams'));
    }
}
