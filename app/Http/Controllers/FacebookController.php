<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook() {
        try {
          $facebook_id = Socialite::driver('facebook')->user();
          $user = User::where('facebook_id', $facebook_id->getId())->first();
          if (!$user){
              $new_user = User::create([
                 'name' => $facebook_id->getName(),
                 'email' => $facebook_id->getEmail(),
                 'facebook_id' => $facebook_id->getId()
              ]);
              Auth::login($new_user);
              return redirect()->intended('home');
          } else {
              Auth::login($user);
              return redirect()->intended('home');
          }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
