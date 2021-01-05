<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
  protected $table = 'pesans';
  protected $fillable = [
    'alamat','no_telepon',
  ];
}
