<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model {

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
