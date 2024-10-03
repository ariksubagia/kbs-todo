<?php
namespace App\Contracts;

use App\Models\User;

interface IAuthService{
    public function login(string $email, string $password): mixed;

    public function logout(): void;

    public function register(string $name, string $email, string $password): User;
}