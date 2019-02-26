<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment2 extends Model
{
  protected $fillable = ['body'];

  // $comment->post
  public function post() {
  return $this->belongsTo('App\myPost');
}
}
