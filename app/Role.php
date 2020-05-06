<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*******/
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
	
    protected $table = 'roles';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'shortname', 'description', 'level'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
