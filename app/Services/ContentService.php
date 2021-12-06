<?php

namespace App\Services;

class ContentService
{
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
