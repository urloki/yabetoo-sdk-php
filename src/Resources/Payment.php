<?php

namespace Yabetoo\Resources;

use Exception;
use Yabetoo\Client\ApiClient;

class Payment
{
    private ApiClient $apiClient;

    public function __construct(String $apiKey)
    {
        $baseUrl = strpos($apiKey, 'sk_test_') === 0
            ? 'https://pay.sandbox.yabetoopay.com'
            : 'https://pay.api.yabetoopay.com';
        $this->apiClient = new ApiClient($baseUrl, $apiKey);
    }

    /**
     * @throws Exception
     */
    public function create($data)
    {
        return $this->apiClient->request('POST', '/v1/payment-intents', $data);
    }

    /**
     * @throws Exception
     */
    public function retrieve($paymentId)
    {
        return $this->apiClient->request('GET', "/v1/payment-intents/{$paymentId}");
    }

    /**
     * @throws Exception
     */
    public function list()
    {
        return $this->apiClient->request('GET', '/v1/payment-intents');
    }

    /**
     * @throws Exception
     */
    public function confirm($paymentId, $data)
    {
        return $this->apiClient->request('POST', "/v1/payment-intents/{$paymentId}/confirm", $data);
    }

}