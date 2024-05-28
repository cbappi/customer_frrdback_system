<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SheetFabric extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function fabric():BelongsTo{
        return $this->belongsTo(Fabric::class);
    }
}
