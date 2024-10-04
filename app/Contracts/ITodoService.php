<?php
namespace App\Contracts;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ITodoService{
    public function create(string $title, string $description): Todo;

    public function delete(int $id): Todo;

    public function setCompleted(int $id, bool $status = true): Todo;

    public function getListTodo(User $user = NULL, string|null $search = NULL): Collection;
}