<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $search = $request->query('search', NULL);

        $q = $request->user()->todos();
        if( !is_null($search) ){
            $q->whereLike('title', '%'. $search .'%');
        }

        return view("home", [ "todos" => $q->get(), "search" => $search ]);
    }
}
