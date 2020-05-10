<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Movie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_movie';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
  

}
