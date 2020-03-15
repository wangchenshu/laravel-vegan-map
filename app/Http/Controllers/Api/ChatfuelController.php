<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use  App\Models\Enum\RegionalEnum;
use App\Http\Resources\Api\RestaurantResource;
use App\Http\Resources\Api\ChatfuelGalleryElementsResource;

class ChatfuelController extends Controller
{
    public function searchFried($regional)
    {
        $restaurants = Restaurant
            ::where("regional", RegionalEnum::getRegionalCHTName($regional))
            ->where("type", "炸物")
            ->skip(0)
            ->take(10)
            ->get();

        $response = [
            'messages' => [
                [
                    'attachment' => [
                        'type' => 'template',
                        'payload' => [
                            'template_type' => 'generic',
                            'image_aspect_ratio' => 'square',
                            'elements' => ChatfuelGalleryElementsResource::collection($restaurants)
                        ]
                    ]
                ]
            ]
        ];

        return $response;
    }
}
