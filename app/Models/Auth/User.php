<?php

namespace App\Models\Auth;

use App\Models\Auth\Person;
use App\Models\Content\Feed;
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
        return $this->hasOne(Person::class, 'user_id');
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function counts()
    {
        $person = $this->person();

        //die(var_dump($person));

        return [
            'works' => $person->works,
            'praises' => $person->praises,
            'followers' => $person->followers,
        ];
    }

    //更新关注动态
    public function updateFollowingsFeeds($max_feed_id)
    {

        $user_ids = $this->getFollowingUids();

        if(is_null($max_feed_id)){

            return Feed::whereIn('user_id', $user_ids)
                            ->with('user')
                            ->limit(30)
                            ->orderBy('created_at', 'desc');
        
        }elseif(is_int($max_feed_id)){

            return Feed::where('id', '>', $max_feed_id)
                            ->whereIn('user_id', $user_ids)
                            ->with('user')
                            ->limit(30)
                            ->orderBy('created_at', 'desc');

        }

    }

    //回溯关注动态
    public function backwardFollowingsFeeds($min_feed_id)
    {

        $user_ids = $this->getFollowingUids();

        return Feed::where('id', '<', $min_feed_id)
                        ->whereIn('user_id', $user_ids)
                        ->with('user')
                        ->limit(30)
                        ->orderBy('created_at', 'desc');
    }

    //获取关注用户和自己的ID
    protected function getFollowingUids()
    {

        $user_ids = $this->followings->pluck('id')->toArray();

        array_push($user_ids, $this->id);

        return $user_ids;

    }


}
