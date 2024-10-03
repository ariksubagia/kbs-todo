<?php

namespace App\Http\Controllers;

use App\Contracts\ITodoService;
use App\Http\Requests\CreateTodoValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    public function __construct(
        private ITodoService $todoService
    ){}

    public function store(CreateTodoValidationRequest $request): mixed{
       $this->todoService->create(
            title: $request->validated("title"), 
            description: $request->validated("description")
        );

        return redirect()->route("home")->with("success", "Todo berhasil disimpan");
    }

    public function destroy(int $id): mixed{
        $this->todoService->delete($id);

        return response()->json([
            "message" => "Todo telah dihapus"
        ], Response::HTTP_OK);
    }

    public function setComplete(Request $request, int $id): mixed{
        $this->todoService->setCompleted($id, $request->input("status"));

        return response()->json([
            "message" => "Status berhasil diubah"
        ], Response::HTTP_OK);
    }
}
