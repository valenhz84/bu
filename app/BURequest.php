<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BURequest extends Model
{
    protected $table = 'Requests';

    public function user()
    {
        return $this->belongsTo('App\User', 'to')->withTrashed();
    }

    // query Scope

    public function scopeSearchBURequest($query, $search_burequest)
    {
        if($search_burequest){
            return $query->where('name','LIKE',"%$search_burequest%");
        }

    }
}
