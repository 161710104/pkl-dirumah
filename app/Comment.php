<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['nama','email','isi_comment'];
    public $timestamps = true;
}
