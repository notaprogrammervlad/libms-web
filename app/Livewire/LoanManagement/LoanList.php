<?php

namespace App\Livewire\LoanManagement;

use Livewire\Component;
use App\Models\Loan;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\BookTransaction;

class LoanList extends Component
{
    public $loans = [];
    public $books;
    public $borrowers;
    public $transaction_fee;

    public function mount()
    {
        $this->loans = Loan::with('book', 'borrower')->where('status', '!=', 'Returned')->get();
        $this->books = Book::all();
        $this->borrowers = Borrower::all();
    }

    public function returnBook($loanId)
    {
        $loan = Loan::findOrFail($loanId);

        if ($loan->status == 'Returned') {
            flash()->info('The book has already been returned.');
            return;
        }

        $loan->status = 'Returned';
        $loan->return_date = now();
        $loan->save();

        $book = $loan->book;
        $book->copies_available += 1;
        $book->save();

        BookTransaction::create([
            'loan_id' => $loan->id,
            'transaction_type' => 'return',
            'amount' => 0,
            'transaction_date' => now(),
        ]);

        flash()->success('Book returned successfully.');

        // Remove the loan from the local collection
        $this->loans = $this->loans->filter(function ($loanItem) use ($loanId) {
            return $loanItem->id !== $loanId;
        });
    }

    public function render()
    {
        return view('livewire.loan-management.loan-list')->layout('layouts.app');
    }
}