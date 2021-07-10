<?php


use App\Service\ApiClient;
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

        $orders = $client->fetchOrders($key)->getOrders();
        $robots = $client->fetchRobots($key)->getRobots();



//        $client->postCommand($key, "move 1 2 \n move 2 2");


//        if (!empty($_POST['start']) && !empty($_POST['name'])) {
//            return;
//        }
//
//        if (empty($_POST['start']) && empty($_POST['name'])) {
//            require_once 'View/home.php';
//            return;
//        }

    }
}
