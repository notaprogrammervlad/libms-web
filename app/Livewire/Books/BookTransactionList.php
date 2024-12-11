<?php

namespace App\Livewire\Books;

use App\Models\BookTransaction;
use Livewire\Component;

class BookTransactionList extends Component
{
    public $transactions;

    public function mount()
    {
        // Get all book transactions
        $this->transactions = BookTransaction::with('loan')->get();
    }
    public function delete($transactionId)
    {
        // Find the transaction by ID
        $transaction = BookTransaction::find($transactionId);

        if ($transaction) {
            // Delete the transaction
            $transaction->delete();

            // Optionally, update the transactions list after deletion
            $this->transactions = BookTransaction::all();
            flash()->success('Transaction deleted successfully!');
        } else {
            flash()->error('Transaction not found.');
        }
    }
    public function render()
    {
        return view('livewire.books.book-transaction-list')->layout('layouts.app');
    }
}
