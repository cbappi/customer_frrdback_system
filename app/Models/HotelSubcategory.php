<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelSubcategory extends Model
{
    use HasFactory;
    protected $fillable = ['sub_cat_name'];
}
