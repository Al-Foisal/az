<?php

namespace App\Services;

class PaypalService
{
    protected $baseUri;
    
    protected $clientId;
    
    protected $clientSecret;
    
    public function __construct()
    {
        $this->baseUri = config('service.paypal.base_uri');
        $this->clientId = config('service.paypal.client_id');
        $this->clientSecret = config('service.paypal.client_secret');
    }
}