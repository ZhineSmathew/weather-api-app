<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Checker</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">🌤️ Weather Checker</h1>

        <div class="mb-4">
            <input type="text" id="city" placeholder="Enter city name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button onclick="getWeather()"
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
            Get Weather
        </button>

        <div id="result" class="mt-6 text-center text-gray-700 hidden">
            <h2 class="text-xl font-semibold mb-2" id="cityName"></h2>
            <p id="temperature" class="text-lg"></p>
            <p id="description" class="text-gray-500"></p>
        </div>
    </div>

    <script>
        function getWeather() {
            const city = document.getElementById('city').value.trim();
            if (!city) {
                alert("Please enter a city name.");
                return;
            }

            axios.get(`/weather/${city}`)
                .then(response => {
                    const data = response.data;
                    document.getElementById('result').classList.remove('hidden');
                    document.getElementById('cityName').innerText = data.city;
                    document.getElementById('temperature').innerText = `🌡 Temperature: ${data.temperature}`;
                    document.getElementById('description').innerText = `🌥 Weather: ${data.weather}`;
                })
                .catch(error => {
                    document.getElementById('result').classList.remove('hidden');
                    document.getElementById('cityName').innerText = 'Error';
                    document.getElementById('temperature').innerText = '';
                    document.getElementById('description').innerText = 'Could not fetch weather data.';
                });
        }
    </script>

</body>
</html>
