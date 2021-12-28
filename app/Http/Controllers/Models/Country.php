<?php

namespace App\Models;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function city(){
        return $this->hasOne(City::class,'country_id');
    }
}
