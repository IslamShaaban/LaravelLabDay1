<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    use Sluggable;


    protected $fillable = [
        "title",
        "description",
        "posted_by",
        "slug"
    ];

    public function user() { //Foreign Key UserID
        return $this->belongsTo(User::class,"posted_by", "id");
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}