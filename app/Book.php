<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = [
    'book_name',
    'book_author',
    'book_id',
    'book_status'
  ];//

  // A book belongs to Student
  public function students()
  {
    return $this->belongsToMany(Student::class)->withTimestamps();
  }
}
