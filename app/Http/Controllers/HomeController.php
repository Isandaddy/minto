<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contents = DB::table('contents')
            ->leftJoin('users', 'contents.user_id', '=', 'users.id')
            ->orderBy('contents.id', 'desc')
            ->get();
        // dd($contents);
        return view('home', ['contents' => $contents]);
    }
}
