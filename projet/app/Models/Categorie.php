<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    protected $fillable = [
        'name',
    ];

    public function events()
    {
        return $this->hasMany(Events::class);
    }
}
