<?php
/*
 * Generate url embed base simple youtube urls
 */
function parseYoutubeUrlEmbed($url) {
    if (stripos($url, 'youtube.com') || stripos($url, 'youtu.be')) {
        $url = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "https://www.youtube.com/embed/$1", $url);

        $url = preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "https://www.youtube.com/embed/$2", $url
        );
        return $url;
    }
    return false;
}
