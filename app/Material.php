<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {

    protected $fillable = ['title', 'alias', 'is_published', 'description'];

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

}
