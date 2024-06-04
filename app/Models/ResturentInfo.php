<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturentInfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function reviews()
    {
        return $this->hasMany(ResturentReview::class, 'resturent_info_id');
    }



    public function resturentcat()
    {
        return $this->belongsTo(ResturentCategory::class, 'resturent_category_id');
    }
}
