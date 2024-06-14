<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'imgcat'
    ];

    public function bookInfos()
    {
        return $this->hasMany(BookInfo::class, 'book_category_id');
    }
}
