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
        $cuts = ["startCut" => "fullstory", "startPoster" => "img src=\"", "endPoster" => "\"", "startTitle" => "name\">", "endTitle" => "<", "startDescription" => "div class=\"full-story\">", "endDescription" => "</div>"];
        $title = "";
        $poster = "";
        $description = "";
        $parts = [];
        foreach ($cuts as $nameOfCut => $cut) {
            $parts = explode($cut, $siteContent, 2);
            $siteContent = $parts[1];
            if ($nameOfCut == "endPoster") {
                $poster = $parts[0];
            }
            if ($nameOfCut == "endTitle") {
                $title = $parts[0];
            }
            if ($nameOfCut == "endDescription") {
                $description = $parts[0];
            }
        }
        $movie = new Movie();
        $movie->setTitle($title);
        $movie->setPoster($poster);
        $movie->setDescription($description);
        return $movie;
    }
}
