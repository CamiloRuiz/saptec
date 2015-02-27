<?php

class Role extends Eloquent {

	public $timestamps = false;

	// Role __has_many__ User
	public function users()
	{
		return $this->hasMany('User');
	}

	// Role __has_many__ Permiso
	public function permisos()
	{
		return $this->belongsToMany('Permiso','permisos_roles');
	}

}