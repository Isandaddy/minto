<?php

namespace App\Services;

use App\User;

class UserService
{

    /**
     * imageのurlを受け取ってstorageに格納し、結果を返す
     * @param int $id
     * @return boolean
     */
    public function userVaidation($id)
    {
        $validated = User::find($id);
        return $validated;
    }
}
