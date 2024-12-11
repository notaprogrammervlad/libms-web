<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $dates = ['loan_date', 'due_date'];
    
    protected $fillable = [
        'book_id', 'borrower_id', 'loan_date', 'return_date', 'due_date', 'status',
    ];
    

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function bookTransactions()
    {
        return $this->hasMany(BookTransaction::class);
    }
}
