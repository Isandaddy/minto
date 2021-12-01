<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contents;

class UserController extends Controller
{

    public function __construct(User $user, Contents $contents)
    {
        $this->user = $user;
        $this->contents = $contents;
    }

    /**
     * contentsの詳細を表示
     * @param int $id
     * @return view
     */
    public function showUserList($id)
    {
        $user = $this->user->getUserByUserId($id);
        $user_contents = $this->contents->getContentsByUserId($id);

        return view('user.user', [
            'contents' => $user_contents,
            'user' => $user
        ]);
    }
}
