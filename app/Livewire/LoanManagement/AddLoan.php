<?php

namespace App\Livewire\LoanManagement;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Borrower;
use App\Models\BookTransaction;
use Livewire\Component;

class AddLoan extends Component
{
    public $book_id;
    public $borrower_id;
    public $loan_date;
    public $due_date;
    public $transaction_fee;
    public $books;
    public $borrowers;

    public function mount()
    {
        $this->books = Book::all();
        $this->borrowers = Borrower::all();
    }

    public function submit()
    {
        $this->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_id' => 'required|exists:borrowers,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:loan_date',
            'transaction_fee' => 'required|numeric|min:0',
        ]);

        $book = Book::find($this->book_id);
        $borrower = Borrower::find($this->borrower_id);

        if (!$book || !$borrower) {
            flash()->error('Invalid book or borrower.');
            return;
        }

        if ($book->copies_available > 0) {
            $loan = Loan::create([
                'book_id' => $this->book_id,
                'borrower_id' => $this->borrower_id,
                'loan_date' => $this->loan_date,
                'due_date' => $this->due_date,
                'status' => 'Borrowed',
            ]);

            BookTransaction::create([
                'loan_id' => $loan->id,
                'transaction_type' => 'loan',
                'amount' => $this->transaction_fee,
                'transaction_date' => now(),
            ]);

            $book->copies_available -= 1;
            $book->save();

            $this->reset(['book_id', 'borrower_id', 'loan_date', 'due_date', 'transaction_fee']);

            flash()->success('Loan successfully added!');
        } else {
            flash()->error('No copies available for this book!');
        }
    }

    public function render()
    {
        return view('livewire.loan-management.add-loan', [
            'books' => $this->books,
            'borrowers' => $this->borrowers
        ])->layout('layouts.app');
    }
}
