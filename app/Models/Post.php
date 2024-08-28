<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $fillable = ["title", "description", "post_creator_id", "image"];
    function postCreators() {
        return $this->BelongsTo(PostCreator::class, "post_creator_id", "id");
    }
    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
