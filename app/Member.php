<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['foto','nama','email','jenis_kelamin','no_hp','lokasi','alamat'];
    public $timestamps = true;

    //------------------------------------------------

    	public function Mobil(){
    		return $this->hasMany('App\Mobil' , 'member_id');
    	}

}
