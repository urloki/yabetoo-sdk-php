<?php

namespace Yabetoo;

use Yabetoo\Client\ApiClient;
use Yabetoo\Resources\Payment;
use Yabetoo\Resources\Session;

class Yabetoo
{
    private ApiClient $apiClient;
    public Payment $payments;
    public Session $sessions;

    public function __construct($apiKey)
    {

        $this->payments = new Payment($apiKey);
        $this->sessions = new Session($apiKey);
    }
}