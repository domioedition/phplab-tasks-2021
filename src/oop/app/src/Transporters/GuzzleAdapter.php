<?php

namespace src\oop\app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{

    public $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $url
     * @return string
     */
    public function getContent(string $url): string
    {
        $response = $this->client->get($url);
        return $response->getBody();
    }
}
