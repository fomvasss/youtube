<?php
/**
 * Created by Web-West | PhpStorm.
 * User: Fomin Vasyl aka fomvasss
 * Date: 10.02.17
 * Time: 11:01
 */

namespace Fomvasss\Youtube;


class Youtube
{
    /**
     * @var mixed
     */
    private $config;

    /**
     * Youtube constructor.
     */
    public function __construct()
    {
        $this->config = config('youtube');
    }

    /**
     * @param string $link
     * @param array $options
     * @return bool|string
     */
    public function iFrame(string $link, array $options = [])
    {
        $options = $options + $this->config;

        $rel = $options['rel'];
        $autoplay = $options['autoplay'];
        $loop = $options['loop'];
        $controls = $options['controls'];
        $showinfo = $options['showinfo'];
        $width = $options['width'];
        $height = $options['height'];
        $frameborder = $options['frameborder'];

        $bootstrap_respons = $options['bootstrap-responsive-embed'];
        $bootstrap_ratio = $options = $options['bootstrap-ratio'];

        $videoID = $this->getYoutubeVideoID($link);

        if ($videoID) {

            if ($bootstrap_respons) {
                $htmlRatio = 'class="embed-responsive-item"';
            } else {
                $htmlRatio = 'width="'.$width.'" height="'.$height.'"';
            }
            $playlist = null;
            if ($loop) {
                $playlist = '&amp;playlist='.$videoID; //TODO playlist (for loop one video)
            }

            $html = '<iframe '. $htmlRatio .
                ' src="https://www.youtube.com/embed/'.$videoID.
                '?rel='.$rel.
                '&amp;autoplay='.$autoplay.
                '&amp;loop='.$loop.
                $playlist.
                '&amp;controls='.$controls.
                '&amp;showinfo='.$showinfo.
                '" frameborder="'.$frameborder.
                '"></iframe>';

            if ($bootstrap_respons) {
                $html = '<div class="embed-responsive embed-responsive-'.$bootstrap_ratio.'">'.$html.'</div>';
            }
            return $html;
        }
        return false;
    }

    /**
     * @param $url
     * @return string|bool
     */
    private function getYoutubeVideoID($url)
    {
        if (preg_match('@\\?v\\=([\\w\\-]*)@i', $url, $matches)) {
            return $matches[1];
        }
        if (preg_match('@embed/([\\w\\-]*)@i', $url, $matches)) {
            return $matches[1];
        }
        if (preg_match('@youtu.be/([\\w\\-]*)@i', $url, $matches)) {
            return $matches[1];
        }
        if (preg_match('@([\\w\\-]*)@i', $url, $matches)) {
            return $matches[1];
        }
        return false;
    }

}