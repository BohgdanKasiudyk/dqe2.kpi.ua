<?php
namespace App\Containers\Login\UI\Web\Controllers;

use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends PortWebController
{
    public function index()
    {
        return View('login.index');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/department');
        }



        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    /**
     * Handle an authentication attempt.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
