<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'cat_id',
        'x',
        'y'
    ];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
}
