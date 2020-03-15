<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatfuelGalleryElementsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'title' => $this->name,
            'image_url' => 'https://scontent.ftpe6-1.fna.fbcdn.net/v/t1.0-9/s960x960/88084913_10221074254702565_1164952897708883968_o.jpg?_nc_cat=100&_nc_sid=07e735&_nc_ohc=xqfh25OI-kQAX9Ol1xC&_nc_ht=scontent.ftpe6-1.fna&_nc_tp=7&oh=a86647594727f95f478814be5939170b&oe=5E94A977',
            'subtitle' => $this->address,
            'buttons' => [
                [
                    'type' => 'web_url',
                    'url' => 'https://www.facebook.com/groups/collective.vegetrian/permalink/2669581096473001/',
                    'title' =>  '點我前往網站',
                ]
            ]
        ];
    }
}
