<?php

declare(strict_types=1);

use App\Service\ApiClient;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'vendor/autoload.php';

$controller = new BaseController();
$client = new ApiClient();


$controller->index($client);









