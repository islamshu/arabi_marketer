<?php
namespace App\Classes;

use GuzzleHttp\Client;

class ZoomClient
{
    private $apiKey;
    private $apiSecret;
    private $client;
    
    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->client = new Client([
            'base_uri' => 'https://api.zoom.us/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateJWT(),
                'User-Agent' => 'Zoom-api-Jwt-Request',
                'Content-Type' => 'application/json'
            ]
        ]);
    }
    
    private function generateJWT()
    {
        $key = env('ZOOM_API_KEY', '');
        $secret = env('ZOOM_API_SECRET', '');
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];

        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }
    
    public function createUser(array $data)
    {
        $response = $this->client->post('users', [
            'json' => $data
        ]);
        
        return json_decode($response->getBody()->getContents());
    }
    
    public function getUser($id)
    {
        $response = $this->client->get("users/$id");
        
        return json_decode($response->getBody()->getContents());
    }
    
    // Other methods to interact with the Zoom API
    // ...
}