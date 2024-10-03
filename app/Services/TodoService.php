<?php
namespace App\Services;
use App\Contracts\ITodoService;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TodoService implements ITodoService{
    public function create(string $title, string $description): Todo{
        $todo = new Todo();
        $todo->title = $title;
        $todo->description = $description;
        $todo->user_id = auth()->user()->id;
        $todo->save();
        return $todo;
    }

    public function delete(int $id): Todo{
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return $todo;
    }

    public function setCompleted(int $id, bool $status = true): Todo{
        $todo = Todo::findOrFail($id);
        $todo->is_completed = $status;
        $todo->save();
        return $todo;
    }

    public function getListTodo(User $user = NULL): Collection{
        $q = Todo::query();

        if( !is_null($user) ){
            $q->where('user_id', $user->id);
        }

        return $q->get();
    }
}