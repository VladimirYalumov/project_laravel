<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityTemp extends Model
{
    protected $table = 'city_temp';
    protected $primaryKey = 'id';

    public $incrementing = TRUE;
    public $timestamps = FALSE;

    protected $fillable = ['city','temp','date','service'];

}
