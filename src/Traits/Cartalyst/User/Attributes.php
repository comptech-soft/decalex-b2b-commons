<?php

namespace B2B\Traits\Cartalyst\User;

trait Attributes {

    /** Attributes. Full name */
    public function getFullNameAttribute() {
        return collect([
			$this->last_name,
            $this->first_name,
		])->filter( function($value) {
			return strlen(trim($value)) != 0;
		})->implode(' ');
    }

    /** Attribute. Active */
    public function getActiveAttribute() {
        $activation = \B2B\Models\Cartalyst\Activation::where('user_id', $this->id)->first();
        if( ! $activation )
        {
            \Activation::create($this);
        }
        return \Activation::completed($this);
    }

    /** Attribute. Role */
    /** Avem useri cu mai multe roluri - ce facem? */
    public function getRoleAttribute() {
        if($this->roles()->count() == 1)
        {
            return $this->roles()->first();
        }
        return $this->roles()->where('type', 'admin')->first();
    }

    public function getIconAttribute() {
        if(! $this->avatar )
        {
            return NULL;
        }
        return $this->avatar['url'];
    }

    public function getInitialsAttribute() {
        $r = collect([
			$this->last_name,
            $this->first_name,
		])->filter( function($value) {
			return strlen(trim($value)) != 0;
		})->map( function($value) { return $value[0]; })->implode('');

        return strtoupper($r);
    }

}