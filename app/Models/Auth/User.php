<?php

namespace App\Models\Auth;

use App\Models\Auth\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Model implements 
    AuthenticatableContract,
    AuthorizableContract
{   
    use Authenticatable, Authorizable, Notifiable;

    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'name',
        'identity',
        'email',
        'password',
        'domain',
        'reg_type',
        'created_ip',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {

        return $this->hasOne(Person::class);

    }

    public function logins()
    {

        return $this->hasMany(Login::class);

    }

    public function feeds()
    {

        return $this->hasMany(Feed::class);

    }


}
