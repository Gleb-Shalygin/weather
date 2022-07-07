<script>
    let cityLocation = document.getElementById('city-location');

    cityLocation.addEventListener('click', handleWeatherByGeolocation);

    function handleWeatherByGeolocation() {
        const options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximum: 0
        }

        const success = async (pos) => {
            const crd = pos.coords;

            const response = await fetch(
                `https://api.geoapify.com/v1/geocode/reverse?lat=${crd.latitude}&lon=${crd.longitude}&apiKey=fbe5393993af426d87b1f7c9db2e4c49`
            );

            const result = await response.json();
            console.log(result);

            cityChange(result.features[0].properties.city);
        }

        const error = (err) => {
            alert(err.code + ' ' + err.message);
        }

        navigator.geolocation.getCurrentPosition(success, error, options);
    }
</script>
