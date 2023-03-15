<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function list()
    {
        $teams = Team::where('companie_id',Auth::user()->companie_id)->get();
        return view('teams/all',compact('teams'));
    }

    public function create($id = null)
    {
        if($id != null)
            $team = Team::where('id',$id)->first();
        else
            $team = new Team();

            return view('ajax/teams/create',compact('team'));
    }

    public function store(Request $request, $id = null)
    {
        if($id != null)
            $team = Team::where('id',$id)->first();
        else
            $team = new Team();
        $team->name = $request->name;
        $team->companie_id = Auth::user()->companie_id;
        $team->user_id = Auth::user()->id;
        $team->save();
        return redirect()->route('allTeams');
    }

    public function invite(Request $request)
    {
        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->team_id = $request->team_id;
        $invitation->token = Str::random(32);
        $invitation->save();
        return redirect()->route('allTeams');
    }

    public function delete(Request $request)
    {
        if (Team::where('id', $request->id)->where('companie_id', Auth::user()->companie->id)->count() > 0) {
            Team::destroy($request->id);
        } else {
            abort(403);
        }
    }
}
