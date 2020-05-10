<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_Users extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_user';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
  

}
