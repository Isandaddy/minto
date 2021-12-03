<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    /**
     * ログインしたユーザーの画像投稿画面を表示
     * @return view
     */
    public function showImageContribution()
    {
        return view('contents.imageContribution');
    }


    /**
     * ログインしたユーザーの画像URLをダウンロードしてデータベースとサーバー内に保存
     * @return redirect
     */
    public function imageStore($id)
    {

        $values = request(['url', 'title', 'comment']);

        $filename =  $values['title'] . '.jpg';

        $file = file_get_contents($values['url']);
        $save = file_put_contents('../storage/app/public/' . $filename, $file, FILE_APPEND);
        //$path = Storage::put('/public', $file);
        if ($save) {

            DB::beginTransaction();
            try {

                $this->contents->uploadContents($id, $values, $filename);

                DB::commit();
                return redirect('/users/' . $id);
            } catch (Exception $e) {
                //delete if no db things........
                //Storage::delete('/public', $file);
                File::delete('../storage/app/public/' . $filename);
                DB::rollback();
            }
        }
    }
}
