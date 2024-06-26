<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }


    public function bookReviews()
    {
        return $this->hasMany(BookReview::class, 'book_info_id');
    }
}


