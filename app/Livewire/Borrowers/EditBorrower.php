<?php

namespace App\Livewire\Borrowers;

use Livewire\Component;
use App\Models\Borrower;
use Carbon\Carbon;

class EditBorrower extends Component
{
    public $borrowerId;
    public $first_name, $last_name, $email, $membership_type, $date_joined;

    public function mount($borrowerId)
    {
        $borrower = Borrower::find($borrowerId);
        $this->borrowerId = $borrower->id;
        $this->first_name = $borrower->first_name;
        $this->last_name = $borrower->last_name;
        $this->email = $borrower->email;
        $this->membership_type = $borrower->membership_type;
        $this->date_joined = $borrower->date_joined;
    }

    public function updateBorrower()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:borrowers,email,' . $this->borrowerId,
            'membership_type' => 'required|string',
        ]);

        $borrower = Borrower::find($this->borrowerId);
        $borrower->first_name = $this->first_name;
        $borrower->last_name = $this->last_name;
        $borrower->email = $this->email;
        $borrower->membership_type = $this->membership_type;
        $borrower->save();

        flash()->success('Borrower updated successfully!');
    }

    public function render()
    {
        return view('livewire.borrowers.edit-borrower')->layout('layouts.app');
    }
}
