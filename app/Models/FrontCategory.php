<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontCategory extends Model
{
    use HasFactory;
    protected $fillable = ['cat', 'image'];
}
