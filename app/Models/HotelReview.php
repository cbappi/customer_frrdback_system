<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function hotel()
    {
        return $this->belongsTo(HotelInfo::class, 'hotel_info_id');
    }
}
