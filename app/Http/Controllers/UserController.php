<?php

namespace App\Http\Controllers;

use App\Models\SiData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ViewDashbaord(Request $request)
    {
        $user = $request->user();


        $countdata = SiData::where('user_id', $user->id)->count();
        return view('user._dashboard',compact('countdata'));
    }
}
