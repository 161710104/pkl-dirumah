<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['nama','merk_id'];
    public $timestamps = true;

    //------------------------------------------------

    	public function Merk(){
    		return $this->belongsTo('App\Merk' , 'merk_id');
    	}

}
