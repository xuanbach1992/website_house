<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();
        $user = $this->findOfCreate($getInfo, $provider);
        Auth::login($user);
        return redirect()->to('/');
    }

    public function findOfCreate($getInfo) {
        $user = User::where('email',$getInfo->email)->first();
        if (!$user)
        {
            $user = User::create([
                'name' => $getInfo->name,
                'password' => $getInfo->id,
                'email' => $getInfo->email,
            ]);
        }
        return $user;
    }
}
