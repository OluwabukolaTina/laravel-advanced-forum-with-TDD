<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    use Favoritable;
    //

    protected $guarded = [];

    protected $with = ['owner', 'favorites'];
    
    public function owner()
    {

    	return $this->belongsTo(User::class, 'user_id');

    }

    // public function favorites()
    // {

    // 	//polymorphic one to many

    // 	return $this->morphMany(Favorite::class, 'favorited');

    // }

    // public function favorite()
    // {
     
    //     $attributes = ['user_id' => auth()->id()];
     
    //     if (! $this->favorites()->where($attributes)->exists()) {
     
    //         return $this->favorites()->create($attributes);
     
    //     }
    // }

    // public function isFavorited()
    // {

    //     //fav r/ship

    //     return !! $this->favorites->where('user_id', auth()->id())->count();
    
    // }

    // public function getFavoritesCountAttribute()
    // {

    //     return $this->favorites->count();

    // }

}
