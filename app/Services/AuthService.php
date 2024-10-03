<?php
namespace App\Services;

use App\Contracts\IAuthService;
use \App\Models\User;

class AuthService implements IAuthService{
    public function login(string $email, string $password): mixed{
        return auth()->attempt([
            "email" => $email,
            "password" => $password
        ]);
    }

    public function logout(): void{
        auth()->logout();
    }

    public function register(string $name, string $email, string $password): User{
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return $user;
    }
}