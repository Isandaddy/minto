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
     * indexページを表示
     *
     * @return view
     */
    public function index()
    {
        $contents = DB::table('users')
            ->leftJoin('contents', 'users.id', '=', 'contents.user_id')
            ->orderBy('contents.id', 'desc')
            ->get();
        // dd($contents);
        return view('home', ['contents' => $contents]);
    }
}
