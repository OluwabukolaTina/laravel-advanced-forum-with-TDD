<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'password', 'social_id', 'social_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {

        return 'name';

    }

    public function threads()
    {

        return $this->hasMany(Thread::class)->latest();

    }

    public function is_admin ()
    {

        if($this->admin)
        {

            return true;

        }

        return false;

    }

    public function discussions()
    {

        return $this->hasMany('App\Discussion');

    }

    public static function createOrFindSocialLogin($socialUser)
    {

      $user = User::where('social_id', $socialUser->id)->first();

      if($user) {

        return $user;

      }

      //no user found
      return User::create([

        'name' => $socialUser->name,

        'avatar' => $socialUser->avatar,

        'email' => $socialUser->email,

        'password' => bcrypt(str_random(16)),

        'social_id' => $socialUser->id,

        'social_token' => $socialUser->token

      ]);

    }

}
