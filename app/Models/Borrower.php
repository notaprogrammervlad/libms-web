<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'membership_type', 'date_joined',
    ];
    protected $casts = [
        'date_joined' => 'date', // Ensure it's treated as a date
    ];
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}