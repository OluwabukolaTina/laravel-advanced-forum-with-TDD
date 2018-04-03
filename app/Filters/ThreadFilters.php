<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters {

	//allof the filters that can be responded to
	protected $filters = ['by'];

	protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }



}