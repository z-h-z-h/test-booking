<?php

namespace App\Services;


use GuzzleHttp\Client;

class BookingApi
{
    protected $client;
    protected $endpoint;
    protected $key;
    protected $site_id;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->endpoint = 'https://ko.tour-shop.ru/siteLead';
        $this->key = 'test198';
        $this->site_id = 100;
    }

    public function send(array $data)
    {
        return $this->client->post($this->endpoint, [
            'headers' => [
                'KoSiteKey' => $this->key,
            ],
            'form_params' => [
                'site_id' => $this->site_id,
                'type' => 'order',
                'data' => $data,
            ]
        ])->getBody()->getContents();
    }

    public function makeBooking(array $data)
    {
        $result = $this->send($data);

        if (strpos($result, 'lead') === false) {
            return false;
        }

        return explode('=', $result)[1];
    }
}
