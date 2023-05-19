<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class PaypalCardController extends Controller
{
        private $client;
        private $clientId;
        private $secret;


    public function __construct()
    {
        $client = new Client([
            'base_uri' => 'http://api-m.sandbox.paypal.com'
        ]);


        $this->clientId = env(key: 'PAYPAL_SANDBOX_CLIENT_ID');
        $this->secret = env(key: 'PAYPAL_SANDBOX_SECRET');

    }

    private function getAccessToken(){
        

        $response = $this->client->request(method: 'GET', uri: '/v1/oauth2/toke', [
            'headers' => [
                'Accept' =>'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => 'grant_type=client_credentials',
            'auth' => [$this->clientId, $this->secret, 'basic']
        ]
    );

    $data = json_encode($response->getBody(), assoc:true);
    return  $access_token = $data['access_token'];

    }

    public function process($orderId){

        $accessToken = $this->getAccessToken();

    $response = $this->client->request(method: 'GET', uri: '/v2/checkout/orders/' . $orderId,[
        'headers' => [
            'Accept' =>'application/json',
            'Authorization' => "Bearer $accessToken",
        ]
        ]);
        return (string) ($response->getBody());
    }
}
