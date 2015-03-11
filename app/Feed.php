<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

}
