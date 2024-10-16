<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class BreweryService
{
    public function fetchBreweries(int $page = 1, int $perPage = 10)
    {
        try {
            $response = Http::get('https://api.openbrewerydb.org/v1/breweries', [
                'page' => $page,
                'per_page' => $perPage,
            ]);

            if ($response->failed()) {
                throw new Exception('Failed to retrieve breweries.');
            }

            return $response->json();

        } catch (Exception $e) {

            throw new Exception('Error fetching breweries: '.$e->getMessage());
        }
    }
}
