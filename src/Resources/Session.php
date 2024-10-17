<?php


namespace Yabetoo\Resources;

use Exception;
use Yabetoo\Client\ApiClient;

class Session
{
    private ApiClient $apiClient;

    public function __construct(String $apiKey)
    {
        $baseUrl = "https://buy.api.yabetoopay.com";
        $this->apiClient = new ApiClient($baseUrl, $apiKey);
    }

    /**
     * @throws Exception
     */
    public function create($data)
    {
        return $this->apiClient->request('POST', '/v1/sessions', $data);
    }
}