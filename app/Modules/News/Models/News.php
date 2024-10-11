<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $table = 'news';
    protected $primaryKey = 'new_id';
    protected $fillable = [
        'title',
        'description',
        'image_news',
    ];
}
