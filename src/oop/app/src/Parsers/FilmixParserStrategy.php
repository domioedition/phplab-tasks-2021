<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $siteContent = mb_convert_encoding($siteContent, "UTF-8", "windows-1251");
        preg_match('/<h1 class=\"name\" itemprop=\"name\">(?s)(.*)\<\/h1>/miu', $siteContent, $matchTitle);
        preg_match('<a class="fancybox" rel="group" href="(?s)(.*?)">', $siteContent, $matchPoster);
        preg_match('/"full-story">(?s)(.*?)<\/div/miu', $siteContent, $matchDescription);
        return ["title"=>$matchTitle[1],"poster"=>$matchPoster[1],"description"=>$matchDescription[1]];
    }
}
