<script>

    function cityInputChange() {
        let city = document.getElementById('city').value;
        cityChange(city);
    }

    function cityChange(city) {
        $(document).ready(function() {
            $.ajax({
                method: "POST",
                url: "{{ route('city-weather') }}",
                data: {
                    city: city
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
            })
                .done(function( msg ) {
                    var res = JSON.parse(msg);

                    changeWeather(res);
                });
        })
    }

    function capitalize(s)
    {
        return s && s[0].toUpperCase() + s.slice(1);
    }

    function changeWeather(res) {
        $('.city').text(res.city);
        $("#icon").attr("src","http://openweathermap.org/img/wn/"+res.icon+"@2x.png");
        $('#temp').text(res.temp);
        $('.weather-status').text(capitalize(res.description));
        $('#rain').text(res.rain + "%");
        $('#speed').text(res.speed + " м/с, западный");
        if(res.pressure < 1000) {
            $('#pressure').text(res.pressure + ' мм рт ст.');
        } else {
            $('#pressure').text(Math.round(res.pressure / 1000) + ' м рт ст.');
        }
        $('#humidity').text(res.humidity + "%");
    }

</script>
