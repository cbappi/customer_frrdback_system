<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];





    public function subcategory()
    {
        return $this->belongsTo(HotelSubcategory::class, 'hotel_subcategory_id');
    }








    public function user() {
        return $this->belongsTo(User::class);
    }

  
}
