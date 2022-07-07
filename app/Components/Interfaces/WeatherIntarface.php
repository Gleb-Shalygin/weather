<?php

namespace App\Components\Interfaces;

use Illuminate\Http\Request;

interface WeatherIntarface {
    /***
     * Возвращает данные с погодой, по указанному городу.
     * @param $city
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getWeatherData($city);
    /***
     * Возвращает погоду, по указанному типу.
     * @param Request $request
     * @return int
     */
    public function getWeather(Request $request) : int;
    /***
     * Изменяет погоду, по указанному городу.
     * @param Request $request
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getChangeWeather(Request $request) : array;
    /***
     * Создает массив с данными о погоде в городе.
     * @param $data
     * @return array
     */
    public function createArrayWeather($data) : array;
}
