<?php

namespace src\oop\app\src\Parsers;

use src\oop\app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{
    public $crawler;

    public function __construct()
    {
        $this->crawler = new Crawler();
    }

    /**
     * @param string $siteContent
     * @return mixed
     */
    public function parseContent(string $siteContent)
    {
        $this->crawler->add($siteContent);
        $title =  $this->crawler->filter('.ftitle > h1')->text();
        $poster = $this->crawler->filter('.fposter > a')->first()->attr('href');
        $description = $this->crawler->filter('.fdesc')->text();
        return ["title"=>$title,"poster"=>$poster,"description"=> $description];
    }
}
