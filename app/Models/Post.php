<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "description", "post_creator_id", "image"];
    function postCreators() {
        return $this->BelongsTo(PostCreator::class, "post_creator_id", "id");
    }
}
