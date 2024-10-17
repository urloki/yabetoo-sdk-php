<?php


namespace Yabetoo\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class ApiClient
{
    private Client $client;
    private String $apiKey;

    public function __construct($baseUrl, $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * @throws \Exception
     */
    public function request($method, $endpoint, $data = [])
    {
        try {
            $options = [];
            if (!empty($data)) {
                $options['json'] = $data;
            }

            $response = $this->client->request($method, $endpoint, $options);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            throw new \Exception('API request failed: ' . $e->getMessage());
        } catch (GuzzleException $e) {
        }
    }
}