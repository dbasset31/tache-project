<?php

namespace App\Http\Controllers;

use App\Models\Civility;
use App\Models\Package;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function formRegister()
    {
        $packages = Package::all();
        $civilites = Civility::all();
        return view('users/register',['civilties' => $civilites, 'packages' => $packages]);
    }
}
