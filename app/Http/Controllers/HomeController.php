<?php

namespace App\Http\Controllers;

use App\Contracts\ITodoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        public ITodoService $todoService
    )
    {}

    public function index(Request $request){
        $search = $request->query('search', NULL);

        return view("home", [ 
            "todos" => $this->todoService->getListTodo($request->user(), $search), 
            "search" => $search 
        ]);
    }
}
