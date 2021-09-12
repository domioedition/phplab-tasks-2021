<?php

namespace src\oop\app\src;

use src\oop\app\src\Models\Movie;
use src\oop\app\src\Parsers\ParserInterface;
use src\oop\app\src\Transporters\TransportInterface;

/**
 * Create Class - Scrapper with method getMovie().
 * getMovie() - should return Movie Class object.
 *
 * Note: Use next namespace for Scrapper Class - "namespace src\oop\app\src;"
 * Note: Dont forget to create variables for TransportInterface and ParserInterface objects.
 * Note: Also you can add your methods if needed.
 */
class Scrapper
{
    public $transport;
    public $parser;

    public function __construct(TransportInterface $transport, ParserInterface $parser)
    {
        $this->transport = $transport;
        $this->parser = $parser;
    }

    public function getMovie($url): Movie
    {
        $data = $this->parser->parseContent($this->transport->getContent($url));
        $movie = new Movie();
        $movie->setTitle($data["title"]);
        $movie->setPoster($data["poster"]);
        $movie->setDescription($data["description"]);
        return $movie;
    }
}
