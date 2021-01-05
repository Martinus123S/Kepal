<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
  protected $table = "produks";
    protected $fillable = ['nama','harga','gambar'];
  protected $guarded = [
    'created_at','updated_at',
  ];

  function cart(){
    return $this->hasMany('App/Cart');
  }
}
