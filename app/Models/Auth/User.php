<?php

namespace App\Models\Auth;

use App\Models\User\Person;
use App\Models\User\Follower;
use App\Models\Feed\Feed;
use App\Models\Works\Works;
use App\Models\Works\Album;
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
        return $this->hasOne(Person::class, 'user_id', 'id');
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

    public function works()
    {
        return $this->hasMany(Works::class);
    } 

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function counts()
    {
        $person = $this->person;

        return [
            'followings' => $person->followings,
            'followers' => $person->followers,
            'praises' => $person->praises,
            'collects' => $person->collects,
            'messages' => $person->messages,
            'works' => $person->works,
            'topics' => $person->topics,
            'opinions' => $person->opinions,
            'sales' => $person->sales,
            'hires' => $person->hires,
            'build_groups' => $person->build_groups,
            'join_groups' => $person->join_groups,
            'build_teams' => $person->build_teams,
            'join_teams' => $person->join_teams,
        ];
    }

    public function info()
    {
        $person = $this->person;

        return [
            'name' => $this->name,
            'gender' => $person->gender,
            'profession' => $person->profession,
            'field' => $person->field,
            'birthday' => $person->birthday,
            'district' => $person->district,
            'brief' => $person->brief,
        ];

    }

    public function name($name)
    {
        $this->name = $name;
        $this->save();

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
