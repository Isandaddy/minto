<?php

namespace App\Http\Controllers\Contents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Contents;
use App\Services\ContentService;

class ContentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Contents $contents, ContentService $contents_service)
    {
        $this->contents = $contents;
        $this->contents_service = $contents_service;
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
        $save = $this->contents_service->saveImageUrl($values, $filename);

        if ($save) {

            DB::beginTransaction();
            try {

                $this->contents->uploadContents($id, $values, $filename);

                DB::commit();
                return redirect('/users/' . $id);
            } catch (Exception $e) {

                File::delete('../storage/app/public/' . $filename);
                DB::rollback();
                throw $e;
            }
        }

        return response($filename, 201);
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

        if ($request->hasFile('image')) {

            $file_name = $this->contents_service->saveImageFile($image_file);

            DB::beginTransaction();
            try {

                $this->contents->uploadContents($id, $values, $file_name);

                DB::commit();
                return redirect('/users/' . $id);
            } catch (Exception $e) {
                Storage::delete('/public', $image_file);

                DB::rollback();
                throw $e;
            }
        }
        return response($image_file, 201);
    }

    /**
     * ログインしたユーザーの画像投稿画面を表示
     * @return view
     */
    public function showVideoContribution()
    {
        return view('contents.videoContribution');
    }

    /**
     * ログインしたユーザーの画像URLをダウンロードしてデータベースとサーバー内に保存
     * @return redirect
     */
    public function videoUrlStore($id)
    {

        $values = request(['url', 'title', 'comment']);
        $embed_url = $this->contents_service->convertToEmbeddedYouTubeUrl($values['url']);

        DB::beginTransaction();
        try {

            $this->contents->uploadContents($id, $values, $embed_url);

            DB::commit();
            return redirect('/users/' . $id);
        } catch (Exception $e) {

            DB::rollback();
            throw $e;
        }
        return response($embed_url, 201);
    }
}
