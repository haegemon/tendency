<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model {

	//
    public function materials(){
        return $this->hasMany('App\Material');
    }

}
