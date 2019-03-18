<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Laravel\Socialite\Two\User as OauthUser;
use Socialite;

/**
 * Handle the authentication process through github.
 */
class LoginController extends Controller
{
    use RedirectsUsers;

    /**
     * Where to redirect users after being authenticated.
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')
             ->except('logout');
        $this->middleware('auth')
            ->only('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')
                        ->scopes(['read:user', 'user:email'])
                        ->redirect();
    }

    public function githubCallback()
    {
        return $this->authenticate(
            Socialite::driver('github')->user()
        );
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect('/')->withSuccess('You have logged out.');
    }

    /**
     * Attempt to authenticate the user from the github oauth callback.
     *
     * @param \Laravel\Socialite\Two\User $oauth
     *
     * @return mixed
     */
    protected function authenticate(OauthUser $oauth)
    {
        if (!$this->tryLogin($oauth)) {
            $this->register($oauth);

            return redirect()->intended($this->redirectPath())->withSuccess('You have been registered');
        }

        return redirect()->intended($this->redirectPath())->withSuccess('Welcome back!');
    }

    /**
     * Attempt to login as an existing user.
     *
     * @param \Laravel\Socialite\Two\User $oauth
     *
     * @return bool
     */
    protected function tryLogin(OauthUser $oauth): bool
    {
        $user = User::where('email', $oauth->email)->first();

        if($user) {
            $this->guard()->loginUsingId($user->id);
            return true;
        }

        return false;
    }

    /**
     * Register a new user.
     *
     * @param \Laravel\Socialite\Two\User $oauth
     */
    protected function register(OauthUser $oauth): void
    {
        $user = User::create([
            'username' => $oauth->nickname,
            'email' => $oauth->email,
            'github_id' => $oauth->id,
            'github_token' => $oauth->token,
        ]);

        $this->guard()->loginUsingId($user->id);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
