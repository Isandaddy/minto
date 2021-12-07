<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Contents;
use App\Services\UserService;

class UserController extends Controller
{

    public function __construct(User $user, Contents $contents, UserService $user_service)
    {
        $this->user = $user;
        $this->contents = $contents;
        $this->user_service = $user_service;
    }

    /**
     * contentsの詳細を表示
     * @param int $id
     * @return view
     */
    public function showUserList($id)
    {
        //登録してないユーザーが接続しようとするとホームに戻る
        if (!$this->user_service->userVaidation($id)) {
            return redirect(route('home'));
        }
        $user = $this->user->getUserByUserId($id);
        $user_contents = $this->contents->getContentsByUserId($id);

        return view('user.user', [
            'contents' => $user_contents,
            'user' => $user
        ]);
    }
}
