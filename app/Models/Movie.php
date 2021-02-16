<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'imageUrl',
        'duration',
        'genre',
        'release_date',
    ];

    public static function search($title="") {
        return self::where("title", "LIKE", "%$title%");
    }
}
