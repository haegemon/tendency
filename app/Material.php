<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

}
