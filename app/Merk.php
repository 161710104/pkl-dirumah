<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = ['logo','nama','deskripsi'];
    public $timestamps = true;

    //------------------------------------------------

    	public function Tipe(){
    		return $this->hasMany('App\Tipe' , 'merk_id');
    	}

}
