<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturentReview extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function resturent()
    {
        return $this->belongsTo(ResturentInfo::class, 'resturent_info_id');
    }
}
