<?php

namespace App\Http\Controllers;

use App\Contents;
use Illuminate\Http\Request;
//use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contents $contents)
    {
        $this->contents = $contents;
        //$this->users = $users;
    }

    /**
     * indexページを表示
     *
     * @return view
     */
    public function index()
    {
        $contents = $this->contents->getAllContents();
        //$users = $this->users->getAllUser();
        return view('home', ['contents' => $contents]);
        //return view('home', compact('contents', 'users'));
    }
}
