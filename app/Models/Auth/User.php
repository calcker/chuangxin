<?php

namespace App\Models\Auth;

use App\Models\Auth\EmailAccount;
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
        'key', 'name', 'identity', 'domain', 'reg_type', 'created_ip', 'email_binding',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function emailAccount()
    {
        return $this->hasOne(EmailAccount::class);
    }

    public function mobileAccount()
    {
        //return $this->hasOne(MobileAccount::class);
    }
    

}
