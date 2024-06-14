<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $fillable = ['book_info_id', 'review_title', 'review_des', 'rating', 'review_type', 'name', 'email'];

    public function bookInfo()
    {
        return $this->belongsTo(BookInfo::class, 'book_info_id');
    }
}
