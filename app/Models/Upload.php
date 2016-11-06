<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
   use SoftDeletes;

	protected $table = 'uploads';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	/**
     * Get the user that owns upload.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    
     public static function allOwner($user_id,$columns = ['*'])
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        $instance = new static;

        return $instance->newQuery()->get($columns)->where('user_id',$user_id);
    }
    /**
     * Get File path
     */
    public function path()
    {
        return url("files/".$this->hash."/".$this->name);
    }
}
