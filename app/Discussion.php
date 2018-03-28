<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Discussion extends Model
{
    //
    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];

    public function channel()
    {

        return $this->belongsTo(Channel::class);

    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }

    public function replies() 
    {

        return $this->hasMany(Reply::class);

    }

    public function watchers()
    {

        //this has many people watching it
        return $this->hasMany(Watcher::class);
    }

    //this is here becuase the discussion in the view is being acceesed from the discussin
    public function isBeingWatchedByAuthUser()
    {

        //get if of authenticated user
        $id = Auth::id();

        //get a list of all that is watching
        $watchers_ids = array();

                //get them here, watchers property being acccessed

        foreach($this->watchers as $w):

            //id pf the persons that liked, like is an instance of the like.php
            array_push($watchers_ids, $w->user_id);

        endforeach;

        //if auth user is in the array check
        if(in_array($id, $watchers_ids))

        {

            return true;
        
        }

        else {

            return false;

        }
    
    }

    public function hasBestAnswer()
    {

        $result = false;

        //fetching this from the r/ship
        foreach($this->replies as $reply)
        {

            //if there is areply with best answer

            if($reply->best_answer)

            {


                $result = true;

                break;
            
            }
        
        }

        return $result;
    }


}
