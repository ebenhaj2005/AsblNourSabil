<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;

    protected $fillable = [
     'title', 'image', 'content', 'publication_date'
    ];
 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 