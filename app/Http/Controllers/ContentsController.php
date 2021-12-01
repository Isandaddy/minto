<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;

class ContentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contents $contents)
    {
        $this->contents = $contents;
    }

    /**
     * contentsの詳細を表示
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $contents = $this->contents->getContentsDetailByContentsId($id);

        if (is_null($contents)) {

            return redirect(route('home'));
        }

        return view('contents.detail', ['contents' => $contents]);
    }
}
