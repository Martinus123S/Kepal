<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
      'kuantitas',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function produk(){
      return $this->belongsTo('App\Produk');
    }

}
