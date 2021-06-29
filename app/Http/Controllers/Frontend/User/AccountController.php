<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;


/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $user = User::find($user_id);
        return view('frontend.user.account')->with('user',$user);
    }
}
