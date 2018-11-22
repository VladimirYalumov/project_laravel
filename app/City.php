<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';

    public $incrementing = TRUE;
    public $timestamps = FALSE;

    protected $fillable = ['city_name','lat','long'];

}
