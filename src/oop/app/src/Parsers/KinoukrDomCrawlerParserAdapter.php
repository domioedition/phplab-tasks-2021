<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    public $crawler;

    public function __constructor()
    {
        $crawler = new Crawler();
    }




    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $crawler = new Crawler($siteContent);
        $crawler = $crawler->filterXPath('//*[@class="wrap"]');
        $crawler1 = $crawler->filterXPath('//*[@class="ftitle"]')->filter('h1');
        $title ="";
        foreach ($crawler1 as $domElement) {
            $title = $domElement->nodeValue;
            break;
        }
        $crawler2 = $crawler->filterXPath('//*[@class="fposter"]');
        $poster =$crawler2->filter('a')->attr('href');
        $description = "";
        $crawler3 = $crawler->filterXPath('//*[@class="fdesc full-text noselect clearfix"]');
        foreach ($crawler3 as $domElement) {
            $description = $domElement->nodeValue;
            break;
        }
        $movie = new Movie();
        $movie->setTitle($title);
        $movie->setPoster($poster);
        $movie->setDescription($description);
        return $movie;
    }
}
