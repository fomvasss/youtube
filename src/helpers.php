<?php


if (!function_exists('youtube_iframe')) {

    function youtube_iframe(string $link, array $options = [])
    {
        return app('youtube')->iFrame($link, $options);
    }

}