<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BUNotification extends Model
{
    protected $table = 'notifications';

    public function user()
    {
        return $this->belongsTo('App\User', 'from')->withTrashed();
    }
}
