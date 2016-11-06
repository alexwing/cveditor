<?php

/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Experience extends Model {

     use SoftDeletes;

     protected $table = 'experiences';
     protected $hidden = [
     ];

    /* public function scopeUser($query) {
          //return $query->where('user_id', '=',  Auth::user()->id);
                  return $query->where('user_id', '=',  1);
     }*/

     protected $guarded = [];
     protected $dates = ['deleted_at'];

}
