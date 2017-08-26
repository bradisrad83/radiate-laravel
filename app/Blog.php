<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['user_id', 'blog_title', 'blog_post', 'blog_photo'];

    public function user() {
  //Blog Model belongs to user(admin=Peter)
        return $this->belongsTo(User::class);
      }

}
