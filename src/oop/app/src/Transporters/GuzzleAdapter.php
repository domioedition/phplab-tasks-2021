<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    /**
     * @param string $url
     * @return string
     */


    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }


    public function getContent(string $url): string
    {
        $response = $this->client->get($url);
        return $response->getBody();
    }
}
