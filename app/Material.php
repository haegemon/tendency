<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model {

    protected $fillable = ['title', 'alias', 'is_published'];

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

}
