<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at'];

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCity($query)
    {
        return $query->select("name")->distinct();
    }

    /**
     * Scope a query to only include city.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCity($query, $city)
    {
        return $query->where("name", $city)->select("area");
    }
}
