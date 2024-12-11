<?php

namespace App\Livewire\Borrowers;

use App\Models\Borrower;
use Livewire\Component;

class BorrowerList extends Component
{
    public $confirmingDelete = false;
    public $borrowerToDelete = null;

    public function confirmDelete($borrowerId)
    {
        $this->confirmingDelete = true;
        $this->borrowerToDelete = $borrowerId;
    }

    public function destroy()
    {
    $borrower = Borrower::find($this->borrowerToDelete);
        if ($borrower) {
            $borrower->delete();
            session()->flash('message', 'Borrower deleted successfully!');
        }
        $this->confirmingDelete = false;
        $this->borrowerToDelete = null;
    }

    public function render()
    {
        $borrowers = Borrower::all(); 

        return view('livewire.borrowers.borrower-list', compact('borrowers'))->layout('layouts.app  ');
    }
}

