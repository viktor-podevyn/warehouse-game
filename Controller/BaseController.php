<?php


class BaseController
{
    public function index(ApiClient $client): void
    {
        //5fc2680e4798be363b7961342becef0a62509f14 key for John Testington I
        $key = '5fc2680e4798be363b7961342becef0a62509f14';

         $client->getView($key);


    }

    public function getKey():void
    {
        $client = new GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'game-the-warehouse.herokuapp.com?mode=start&name=John_Testington_I&easymode=true');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }





}
