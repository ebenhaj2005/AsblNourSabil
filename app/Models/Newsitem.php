<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'picture',
        'publication_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 