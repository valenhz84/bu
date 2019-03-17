<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use SoftDeletes;

    protected $table = 'Periods';
    protected $dates = ['deleted_at'];

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }
}
