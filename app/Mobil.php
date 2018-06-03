<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['id','gambar','nama','warna','transmisi','varian','cakupan_mesin','penumpang','kilometer','tahun_keluar','harga','deskripsi','merk_id','tipe','member_id'];
    public $timestamps = true;

    //------------------------------------------------

    	public function Member(){
    		return $this->belongsTo('App\Mobil' , 'mobil_id');
    	}


    	public function Merk(){
    		return $this->belongsTo('App\Merk' , 'merk_id');
    	}


}
