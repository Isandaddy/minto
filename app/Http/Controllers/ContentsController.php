<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contents;

class ContentsController extends Controller
{

    /**
     * contentsの詳細を表示
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $contents = Contents::find($id);

        if (is_null($contents)) {

            return redirect(route('home'));
        }
        // dd($contents);
        return view('contents.detail', ['contents' => $contents]);
    }
}
