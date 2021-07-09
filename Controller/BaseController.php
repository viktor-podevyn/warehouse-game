<?php


class BaseController
{
    public function index(): void
    {
        //5fc2680e4798be363b7961342becef0a62509f14 key for John Testington I




    }

    public function getKey()
    {
        $client = new GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'game-the-warehouse.herokuapp.com?mode=start&name=John_Testington_I&easymode=true');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();
    }





}
