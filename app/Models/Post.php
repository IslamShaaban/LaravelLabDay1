<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "posted_by"
    ];

    public function user() { //Foreign Key UserID
        return $this->belongsTo(User::class,"posted_by", "id");
    }
}