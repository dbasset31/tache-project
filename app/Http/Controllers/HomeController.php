<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $date = date('Y-m-d H:i:s');
        $time = Carbon::parse($date);
        $endTime = $time->addMinutes(2);
        $nbOnline = DB::table('users')->where('date_activite', '>=', $date)
                                            ->where('date_activite', '<=', $endTime)
                                            ->where('companies.user_id', '=', Auth::user()->id)
                                            ->join('companies', 'users.id', 'companies.user_id')
                                            ->count();
        $nbTotal = DB::table('users')->where('companie_id', Auth::user()->companie->id);
        $nbTotal = $nbTotal->count();

        return view('welcome', ['online' => $nbOnline, 'total' => $nbTotal]);
    }
}
