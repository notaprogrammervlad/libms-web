<?php

namespace App\Livewire\LoanManagement;

use Livewire\Component;
use App\Models\Loan;

class ReturnedLoans extends Component
{
    public $returnedLoans;

    public function mount()
    {
        $this->returnedLoans = Loan::whereNotNull('return_date')
                                    ->where('status', 'returned')
                                    ->get();
    }

    public function render()
    {
        return view('livewire.loan-management.returned-loans')->layout('layouts.app');
    }
}
