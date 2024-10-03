<?php

namespace App\Http\Controllers;

use App\Contracts\IAuthService;
use App\Http\Requests\LoginValidationRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private IAuthService $authService
    ){}

    public function login(Request $request): View{
        return view("login");
    }

    public function store(LoginValidationRequest $request): RedirectResponse{
        $attempt = $this->authService->login($request->input("email"), $request->input("password"));
        
        if( !$attempt ){
            return redirect()->back()->withErrors([ "error" => "Email atau Password salah" ]);
        }

        // dd($request->input());
        return redirect()->route("home");
    }
}
