<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Reply extends Model
{
    //
    protected $fillable = ['content', 'user_id', 'discussion_id'];

    public function discussion()
    {

        return $this->belongsTo('App\Discussion');

    }

    public function user()
    {

    	return $this->belongsTo(User::class);

    }

    public function likes()
    {

        return $this->hasMany(Like::class);

    }

    public function isLikedByAuthUser()
    {

        $id = Auth::id();

        //empty array that will store the likers, then push the ids of all that has lied to this array
        $likers = array();

        //access the likes method
        foreach($this->likes as $like):

            //id pf the persons that liked, like is an instance of the like.php
            array_push($likers, $like->user_id);

        endforeach;

        if(in_array($id, $likers))
        {

            return true;

        }

        else 
        {

            return false;
        
        }
    }

}
