<?php

namespace App\Services;

use GuzzleHttp\Client;

class LocationService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCoordinates($address)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $response = $this->client->get("https://maps.googleapis.com/maps/api/geocode/json", [
            'query' => [
                'address' => $address,
                'key' => $apiKey
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        if (!empty($data['results'])) {
            $location = $data['results'][0]['geometry']['location'];
            return [
                'latitude' => $location['lat'],
                'longitude' => $location['lng']
            ];
        }

        return null;
    }
}
