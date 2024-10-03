<?php

namespace App\Http\Controllers;

use App\Contracts\IAuthService;
use App\Http\Requests\RegisterValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(
        public IAuthService $authService
    ){}

    public function index(Request $request): View{
        return view("register");
    }

    public function store(RegisterValidationRequest $request){
        $this->authService->register(
            name: $request->input("name"),
            email: $request->input("email"),
            password: $request->input("password")
        );

        return redirect()->route("login")->with("success", "Akun berhasil ditambahkan");
    }
}
