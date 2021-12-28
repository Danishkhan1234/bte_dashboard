<?php

namespace App\Models;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;


class City extends Model
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

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
     }
}
