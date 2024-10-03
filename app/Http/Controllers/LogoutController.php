<?php

namespace App\Http\Controllers;

use App\Contracts\IAuthService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(
        private IAuthService $authService
    ){}

    public function index(){
        $this->authService->logout();
        return redirect()->route("login");
    }
}
