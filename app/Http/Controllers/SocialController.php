<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{
    public function redirect($social){
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        Auth::login($user);

        return redirect('home');
    }
}
