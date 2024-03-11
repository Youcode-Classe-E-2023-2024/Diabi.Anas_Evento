<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'is_approved'
    ];


    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }
}   
