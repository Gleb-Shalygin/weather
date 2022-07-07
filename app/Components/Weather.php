<?php

namespace App\Components;

use App\Components\Interfaces\WeatherIntarface;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class Weather implements WeatherIntarface
{

    private $import; // переменная для использования API.

    public function __construct()
    {
        $this->import = new ImportWeatherDataClient();
    }

    public function getWeatherData($city)
    {
        try {
            $response = $this->import->client->request('GET', 'forecast?q='.$city.',RU&cnt=1&lang=ru&units=metric&appid='.session('token'));
            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody()->getContents());
        }
    }

    public function getWeather(Request $request) : int
    {
        if($request->typeWeather == 'true') {
            return round($request->temp * 9 / 5 + 32);
        } else {
            return $request->temp;
        }
    }

    public function getChangeWeather(Request $request) : array
    {
        $response = $this->import->client->request('GET', 'forecast?q='.$request->city.',RU&cnt=1&lang=ru&units=metric&appid='.session('token'));
        $data = json_decode($response->getBody()->getContents(), true);
        return $this->createArrayWeather($data);
    }

    public function createArrayWeather($data) : array
    {
        return [
            'city' => $data['city']['name'],
            'temp' => round($data['list'][0]['main']['feels_like']),
            'speed' => round($data['list'][0]['wind']['speed']),
            'pressure' => $data['list'][0]['main']['pressure'],
            'humidity' => $data['list'][0]['main']['humidity'],
            'rain' => $data['list'][0]['clouds']['all'],
            'icon' => $data['list'][0]['weather'][0]['icon'],
            'description' => $data['list'][0]['weather'][0]['description']
        ];
    }
}
