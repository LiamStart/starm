<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
  

}
