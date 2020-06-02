<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    // Create a fillable property for all fields in the post form
    protected $fillable = [
      'title', 'description', 'content', 'image', 'published_at'
    ];
}
