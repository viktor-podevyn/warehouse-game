<?php


use GuzzleHttp\Exception\GuzzleException;

class BaseController
{
    /**
     * @throws GuzzleException
     */
    public function index(ApiClient $client): void
    {
        //5fc2680e4798be363b7961342becef0a62509f14 key for John Testington I
        $key = '5fc2680e4798be363b7961342becef0a62509f14';

//        $client->postOrder($key, "pickup \n  move 2 2");
         $client->getGrid($key);

    }
}
