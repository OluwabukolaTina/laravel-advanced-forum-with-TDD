<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

	public $table = "channels";
    //
    protected $fillable = ['title', 'slug']; 

    public function discussions()
    {

        return $this->hasMany(Discussion::class);

    }







}
