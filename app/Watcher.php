<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watcher extends Model
{

	protected $fillable = ['discussion_id', 'user_id'];
    //
    public function user()
    {

    	return $this->belongsTo(User::class);

    }

    public function discussion()
    {

    	return $this->belongsTo(Discussion::class);
    }

}
