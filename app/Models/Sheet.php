<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sheet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function learner():BelongsTo{
        return $this->belongsTo(Learner::class);
    }

    function sheet_accessory():HasMany{
        return $this->hasMany(SheetAccessory::class);
    }
}
