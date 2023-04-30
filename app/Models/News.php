<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "restaurant_news";
    protected $primaryKey="news_id";

    protected $fillable = [
        'title',
        'description',
        'thumbnail_image',
        'restaurant_id'
    ];

}
