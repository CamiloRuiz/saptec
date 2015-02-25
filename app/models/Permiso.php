<?php

class Permiso extends Eloquent {

	public $timestamps = false;

	public function role()
    {
        return $this->belongsToMany('Role');
    }

}