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
        $cut1 = substr($siteContent, strpos($siteContent, "fullstory"));
        $cut2 = substr($cut1, strpos($cut1, "img src=\"")+9);
        $poster = substr($cut2, 0, strpos($cut2, "\""));
        $cut3 = substr($cut2, strpos($cut2, "name\">")+6);
        $title = substr($cut3, 0, strpos($cut3, "<"));
        $descriptionStart = strpos($cut3, "div class=\"full-story\">")+23;
        $descriptionStartCut = substr($cut3, $descriptionStart);
        $descriptionEnd = strpos($descriptionStartCut, "</div>");
        $description = substr($descriptionStartCut, 0, $descriptionEnd);
        $movie = new Movie();
        $movie->setTitle($title);
        $movie->setPoster($poster);
        $movie->setDescription($description);
        return $movie;
    }
}
