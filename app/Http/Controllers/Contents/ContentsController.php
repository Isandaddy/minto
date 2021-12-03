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
    public function imageUrlStore($id)
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

                File::delete('../storage/app/public/' . $filename);
                DB::rollback();
            }
        }
    }

    /**
     * ログインしたユーザーの画像アップロードページを表示
     * @return view
     */
    public function showImageUpload()
    {
        return view('contents.imageUpload');
    }

    /**
     * ログインしたユーザーの画像ファイルをデータベースとサーバー内に保存
     * @return redirect
     */
    public function imageFileStore(Request $request, $id)
    {

        $values = $request->all();
        $image_file = $request->file('image');
        //dd($image_file);

        if ($request->hasFile('image')) {
            $path = \Storage::put('/public', $image_file);
            $path = explode('/', $path);

            DB::beginTransaction();
            try {

                $this->contents->uploadContents($id, $values, $path[1]);

                DB::commit();
                return redirect('/users/' . $id);
            } catch (Exception $e) {
                Storage::delete('/public', $image_file);
                //File::delete('../storage/app/public/' . $filename);
                DB::rollback();
            }
        }
    }
}
