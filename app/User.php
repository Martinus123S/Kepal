<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'alamat', 'no_telepon', 'jenis_kelamin', 'tgl_lahir', 'isVerified'
  ];


  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function isAdmin()
  {
    return $this->admin;
  }

  function cart()
  {
    return $this->hasOne('App/Cart');
  }
}
