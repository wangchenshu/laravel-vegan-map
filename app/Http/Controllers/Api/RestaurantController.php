<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\RestaurantResource;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return $this->success(RestaurantResource::collection($restaurants));
    }

    public function show(Restaurant $restaurant)
    {
        return $this->success(new RestaurantResource($restaurant));
    }
}
