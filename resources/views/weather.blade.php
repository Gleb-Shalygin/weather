@extends('layout.app')
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="header">
    <div class="city-panel">
        <span class="city">Омск</span>
        <div class="city-button">
            <p class="city-act">Сменить город</p>
            <img src="img/Path2.png">
            <p id="city-location">Моё местоположения</p>

        </div>
        <div class="rename-city">
            <input type="search" id="city">
            <button type="submit" onclick="cityInputChange()">ОК</button>
        </div>
    </div>

    <div class="cheked-temp">
        <div class="switch">
            <input id="type_weather" type="checkbox" onclick="clickTypeWeather()">
            <span>C F</span>
        </div>
    </div>

</div>

<div class="weather-panel">
    <img id="icon" src="http://openweathermap.org/img/wn/{{$icon}}@2x.png">
    <span class="weather" id="temp">{{ round($temp) }}</span>
</div>
<div class="weather-status">
    {{  mb_strtoupper(mb_substr($description, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(mb_convert_case($description, MB_CASE_LOWER, 'UTF-8'), 1, mb_strlen($description), 'UTF-8') }}
</div>

<div class="desc-weather">
    <div class="desc-panel act">
        <p>Ветер</p>
        <span id="speed">{{ round($speed) }} м/с, западный</span>
    </div>
    <div class="desc-panel act">
        <p>Давление</p>
        @if( $pressure < 1000)
        <span id="pressure">{{$pressure}} мм рт ст.</span>
        @else
        <span id="pressure">{{round($pressure / 1000)}} м рт ст.</span>
        @endif
    </div>
    <div class="desc-panel act">
        <p>Влажность</p>
        <span id="humidity">{{ $humidity }}%</span>
    </div>
    <div class="desc-panel">
        <p>Вероятность дождя</p>
        <span id="rain">{{$rain}}%</span>
    </div>
</div>
<script src="js/main.js"></script>
{{--  Ввод города  --}}
@include('layout.city_input')
{{-- Изменение по геолокации --}}
@include('layout.geolocation')
{{--Изменение по типу--}}
@include('layout.type_weather')
@endsection
