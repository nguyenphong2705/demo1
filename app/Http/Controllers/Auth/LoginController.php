<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Socialite;

use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function googleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();
        return $this->handleSocialLogin('google', $userGoogle);
    }
    
    public function handleSocialLogin($provider, $userProvider){

        $providerId = $userProvider->id;

        $user = User::where('provider', $provider)
        ->where('provider_id', $providerId)
        ->first();
        if(!$user){
            $user = new User();
            $user->name = $userProvider->name;
            $user->email = $userProvider->email;
            $user->provider_id = $providerId;
            $user->provider = $provider;
            $user->password = Hash::make(rand());

            $user->save();
        }
        $userId = $user->id;
        Auth::loginUsingID($userId);

        return redirect($this->redirectTo);
    }
}
