<?php


use GuzzleHttp\Client;

class ApiClient
{
    private Client $client;
    const BASE_PATH = 'game-the-warehouse.herokuapp.com';
    const KEY_REQUEST = '?mode=start&name=John_Testington_I&easymode=true';
    const VIEW_REQUEST = '?mode=view&key=';

    /**
     * ApiClient constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleHttp\Client();
    }

    public function getView(string $key): string
    {
        $request = new \GuzzleHttp\Psr7\Request('GET', self::BASE_PATH.self::VIEW_REQUEST.$key);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
        echo $response->getBody()->getContents();
        });
        $promise->wait();
    }
}
