<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ContentService
{

    /**
     * imageのurlを受け取ってstorageに格納し、結果を返す
     * @param array $values
     * @return boolean
     */
    public function saveImageUrl($values, $file_name)
    {
        $file = file_get_contents($values['url']);
        $save = file_put_contents('../storage/app/public/' . $file_name, $file, FILE_APPEND);

        return $save;
    }

    /**
     * imageファイルを受け取ってstorageに格納し、ファイル名を返す
     * @param object $image_file
     * @return string
     */
    public function saveImageFile($image_file, $title)
    {
        $extension = $image_file->extension();
        $path = \Storage::putFileAs('/public', $image_file, $title . '.' . $extension);
        $file = explode('/', $path);
        $file_name = $file[1];

        return $file_name;
    }

    /**
     * youtubeのurlを受け取ってembedUrlに変えて返す
     * @param int $url
     * @return string embedUrl
     */
    public function convertToEmbeddedYouTubeUrl($url)
    {
        $regExp = '/^(?:https?:\/\/)?(?:www\.)?(?:(?:youtube.com\/(?:(?:watch\?v=)|(?:embed\/))([a-zA-Z0-9-]{11}))|(?:youtu.be\/([a-zA-Z0-9-]{11})))/';
        preg_match($regExp, $url, $matches);
        $url_id = $matches ? $matches[1] : $url;
        $embed_url = 'https://www.youtube.com/embed/' . $url_id;

        return $embed_url;
    }
}
