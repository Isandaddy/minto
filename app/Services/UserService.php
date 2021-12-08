<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    /**
     * paramで受け取ったidが登録idか確認後、結果を返す
     * @param int $id
     * @return boolean
     */
    public function userVaidation($id)
    {
        $validated = User::find($id);
        return $validated;
    }

    /**
     * paramで受け取ったidがログインしたユーザーと一致するか確認後、結果を返す
     * @param int $id
     * @return boolean
     */
    public function checkUserId($id)
    {
        $user_id = Auth::user()->id;
        $checked = $user_id == $id ? true : false;
        return $checked;
    }
}
