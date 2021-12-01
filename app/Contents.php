<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Contents extends Model
{
    /**
     *  最初のページに全てのコンテンツを返す
     * @return object
     */
    public function getAllContents()
    {
        return Contents::select('contents.*', 'users.name')
            ->join('users', 'contents.user_id', '=', 'users.id')
            ->orderBy('contents.id', 'desc')
            ->get();
    }

    /**
     * idにマッチしたcontentを返す
     * @param int id
     * @return object
     */
    public function getContentsDetailByContentsId($id)
    {
        return Contents::find($id);
    }

    /**
     * user_idにマッチしたcontentsを返す
     * @param int id
     * @return object
     */
    public function getContentsByUserId($id)
    {
        return Contents::where('user_id', '=', $id)
            ->orderBy('id', 'desc')
            ->get();
    }
}
