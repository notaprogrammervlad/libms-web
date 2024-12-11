<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\Loan;

class Index extends Component
{
    public $totalBooks;
    public $totalBorrowers;
    public $activeLoans;
    public $recentActivities;

    public function mount()
    {
        $this->totalBooks = Book::count();
        $this->totalBorrowers = Borrower::count();
        $this->activeLoans = Loan::where('status', 'active')->count();
    }

    public function render()
    {
        return view('livewire.dashboard.index')->layout('layouts.app');
    }
}