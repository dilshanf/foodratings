<?php

namespace App\Services;

use GuzzleHttp\Client;

class FoodRatingsService
{

    private $url;
    private $client;
    private $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = env("FOODRATINGS_URL");
        $this->headers = ['x-api-version' => '2'];
    }

    // Authorities service returns array
    public function getAuthorities()
    {
        
        $fullurl = $this->url . "/Authorities";

        $response = $this->client->request('GET', $fullurl, [
            'headers' => $this->headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        $authoritiesOut = array();

        // Loop through the response and only get the ID and name
        foreach ($responseBody->authorities as $authorities) {
            array_push($authoritiesOut, array(
                'id' => $authorities->LocalAuthorityId,
                'name' => $authorities->Name
            ));
        }

        return $authoritiesOut;
    }

    // Establishments service returns array
    public function getEstablishmentsByAuthorityId($authorityId)
    {
        $fullurl = $this->url . '/Establishments?localAuthorityId=' . $authorityId;

        $response = $this->client->request('GET', $fullurl, [
            'headers' => $this->headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        $establishmentsOut = array();
        
        // Loop through the response and only get the ID, rating and rating date converted to human readable format
        foreach ($responseBody->establishments as $establishments) {
            $newDate = date("d M Y", strtotime($establishments->RatingDate));
            array_push($establishmentsOut, array(
                'id' => $establishments->LocalAuthorityBusinessID,
                'rating' => $establishments->RatingValue,
                'rating_date' => $newDate
            ));
        }

        return $establishmentsOut;
    }
}