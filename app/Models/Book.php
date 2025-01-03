<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'genre', 'published_date', 'copies_available', 'shelf_code',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}