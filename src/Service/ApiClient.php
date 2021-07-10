<?php

namespace App\Service;

use App\Model\Ingredients;
use App\Model\Orders;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class ApiClient
{
    private Client $client;
    private const BASE_PATH = 'game-the-warehouse.herokuapp.com';
    private const INGREDIENTS_REQUEST = '?mode=ingredients&key=';
    private const ORDER_REQUEST = '?mode=orders&key=';
    private const STATE_REQUEST = '?mode=state&key=';
    private const GRID_REQUEST = '?mode=grid&key=';
    private const VIEW_REQUEST = '?mode=view&key=';
    private const DO_TURN = '?mode=doturn&key=';
    private const ROBOTS_REQUEST = '?mode=robots&key=';
    private Converter $converter;

    /**
     * ApiClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->converter = new Converter();
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function getRequest(string $type, string $key):array
    {
        try {
            $response = $this->client->get(self::BASE_PATH.$type.$key);
            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        }catch (Exception){
            throw new Exception("API request failed");
        }
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function postCommand($key, string $order):array
    {
        try {
            $response = $this->client->post(self::BASE_PATH.self::DO_TURN.$key,["form_params" => ["input"=> $order]]);
            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        }catch (Exception)
        {
            throw new Exception("Command could not be sent");
        }
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getView(string $key): void
    {
        try {
            $response = $this->client->get(self::BASE_PATH.self::VIEW_REQUEST.$key);
            echo $response->getBody()->getContents();
        }catch (Exception){
            throw new Exception("Fetching of view failed");
        }

    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function fetchOrders(string $key): Orders
    {
        $ordersArray = $this->getRequest(self::ORDER_REQUEST , $key);
        return $this->converter->arrayToOrders($ordersArray);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function fetchRobots($key): \App\Model\Robots
    {
        $robotArray = $this->getRequest(self::ROBOTS_REQUEST , $key);
        return $this->converter->arrayToRobots($robotArray);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getIngredients($key): Ingredients
    {
        $ingredientsArray = $this->getRequest(self::INGREDIENTS_REQUEST , $key);
        return $this->converter->arrayToIngredients($ingredientsArray);
    }

    /**
     * @throws GuzzleException
     */
    public function getGrid($key):void
    {
        $gridArray = $this->getRequest(self::GRID_REQUEST , $key);
        var_dump($gridArray);
    }

    /**
     * @throws GuzzleException
     */
    public function getState($key):void
    {
        $stateArray = $this->getRequest(self::STATE_REQUEST , $key);
        var_dump($stateArray);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getNewGameKey(string $newPlayerName):array
    {
        try {
            $response = $this->client->get("?mode=start&name=${$newPlayerName}&easymode=true");
            return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        }catch (Exception){
            throw new Exception("Game-key request failed");
        }
    }

}
