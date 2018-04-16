<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
    'name',
    'mis_no',
    'gender',
    'ibutton_no',
    'email',
    'mobile_no',
    'profile_img',
    'amount_left',
    'active'
  ];

  // A Student has many books
  public function books()
  {
    return $this->belongsToMany(Book::class)->withTimestamps();
  }


}
