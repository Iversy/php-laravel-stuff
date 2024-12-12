<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'album_id',
        'name',
        'length',
    ];

    // Определение обратного отношения с альбомом
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
