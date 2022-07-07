<?php

namespace App\Http\Controllers;

use App\Components\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    private $object; // Объект взаимодействия с классом Weather.

    /***
     * Создаем объект класса Weather.
     */
    public function __construct()
    {
        $this->object = new Weather();
    }

    /***
     * Выводит данные о городе ( по умолчанию установил Омск ).
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function output()
    {
        $data = $this->object->getWeatherData('Омск');
        if(isset($data->cod) == 401) {
            abort($data->cod, $data->message);
        }
        return view('weather', $this->object->createArrayWeather($data));
    }

    /***
     * Ввод токена.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inputToken(Request $request) {
        session(['token' =>  $request->input('appid')]);
        return response()->redirectTo('/weather');
    }

    /***
     *  Меняет °C на ℉ или наоборот.
     * @param Request $request
     * @return void
     */
    public function typeWeather(Request $request) {
        if($request->ajax()) {
            echo ($this->object->getWeather($request));
        }
    }

    /***
     * Меняет погоду, по указанному городу.
     * @param Request $request
     * @return void
     */
    public function cityWeather(Request $request) {
        if($request->ajax()) {
            echo json_encode($this->object->getChangeWeather($request));
        }
    }


}
