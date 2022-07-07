<script>
    var chboxTypeWeather = document.getElementById('type_weather');
    let typeWeather = false;

    function clickTypeWeather() {
        if(typeWeather === true) {
            typeWeather = false;
        } else {
            typeWeather = true;
        }
        $(document).ready(function() {
            $.ajax({
                method: "POST",
                url: "{{ route('type-weather') }}",
                data: {
                    typeWeather: typeWeather, temp: {{ round($temp) }}
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
            })
                .done(function( msg ) {
                    $('.weather').text('');
                    $('.weather').text(msg);
                });
        })
    }
</script>
