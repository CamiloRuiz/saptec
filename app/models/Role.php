<?php

class Role extends Eloquent {

	public $timestamps = false;

	// Artista __has_many__ Album
	public function users()
	{
		return $this->hasMany('User');
	}

}