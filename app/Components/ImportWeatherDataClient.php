<?php

namespace App\Components;

use GuzzleHttp\Client;

/**
 * Класс, который обращается к API
 */
class ImportWeatherDataClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/',
            'timeout' => 2.0,
            'verify' => false
        ]);
    }
}
