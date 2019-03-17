<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;
	
    protected $table = 'Assignments';
    protected $dates = ['deleted_at'];

    public function period()
    {
        return $this->belongsTo('App\Period')->withTrashed();
    }

    public function activitie()
    {
        return $this->belongsTo('App\Activitie')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withTrashed();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->withTrashed();
    }

    public function files()
    {
        return $this->hasMany('App\File')->withTrashed();
    }

    // query Scope

    public function scopeSearchAssignment($query, $search_assignment)
    {
        if($search_assignment){
            return $query->where('name','LIKE',"%$search_assignment%");
        }

    }
}
