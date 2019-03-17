<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**********/
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'active' ,'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role')->withTrashed();
    }

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function burequests()
    {
        return $this->hasMany('App\BURequest');
    }

    // query Scope

    public function scopeSearchUser($query, $search_user)
    {
        if($search_user){
            return $query->where('firstname','LIKE',"%$search_user%")
                        ->orWhere('lastname','LIKE',"%$search_user%")
                        ->orWhere('email','LIKE',"%$search_user%");
        }

    }
}
