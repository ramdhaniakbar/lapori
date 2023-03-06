<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        return redirect()->route('index')->withCookie(cookie('remember_token', null, 0));
    }
}
