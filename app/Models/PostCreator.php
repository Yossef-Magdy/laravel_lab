<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCreator extends Model
{
    use HasFactory;
    protected $fillable = ["name"];
    function posts() {
        return $this->hasMany(Post::class, "post_creator_id", "id");
    }
}
