<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function __construct(protected WeatherService $weather)
    {
        $this->weather = $weather;
    }

    public function show($city = 'London')
    {
        // $city = $request->input('city', 'pathanamthitta');

        try {
            $data = $this->weather->getWeatherByCity($city);
            return response()->json([
                'city' => $data['name'],
                'temperature' => $data['main']['temp'] . '°C',
                'weather' => $data['weather'][0]['description'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Weather API failed'], 500);
        }
    }
}
