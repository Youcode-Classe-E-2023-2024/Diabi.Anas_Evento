<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}