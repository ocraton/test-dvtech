<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseResponseController;
use App\Services\BreweryService;
use Illuminate\Http\Request;
use App\Http\Resources\BreweriesResource;

class BreweryController extends BaseResponseController
{
    protected $breweryService;

    public function __construct(BreweryService $breweryService)
    {
        $this->breweryService = $breweryService;
    }

    public function index()
    {

        $page = request()->query('page', 1);
        
        $perPage = request()->query('per_page', 10);

        $breweries = $this->breweryService->fetchBreweries($page, $perPage);

        return $this->sendResponse(BreweriesResource::collection(collect($breweries)), 'Breweries retrieved successfully', 200);

    }
}
