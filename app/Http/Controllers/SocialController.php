<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\User;
class SocialController extends Controller
{
public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}

public function callback($provider)
{

    $getInfo = Socialite::driver($provider)->user();

    $user = $this->createUser($getInfo,$provider);

    auth()->login($user);

    return redirect()->to('/home');

}
function createUser($getInfo,$provider){

    $user = User::where('provider_id', $getInfo->id)->first();

    if (!$user) {
        $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
    }
    return $user;
    }

    public function fredirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function fcallback($provider)
    {
    $getInfo = Socialite::driver($provider)->user();
    $user = $this->createUser($getInfo,$provider);
    auth()->login($user);
    return redirect()->to('/home');
    }




    public function lredirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function lcallback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo,$provider);

        auth()->login($user);

        return redirect()->to('/home');

    }
}
