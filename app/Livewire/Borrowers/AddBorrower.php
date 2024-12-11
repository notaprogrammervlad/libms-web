<?php

namespace App\Livewire\Borrowers;

use App\Models\Borrower;
use Livewire\Component;

class AddBorrower extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $membership_type;
    public $date_joined;

    public function mount()
    {
        // Set current date as default for date_joined
        $this->date_joined = now()->toDateString(); // e.g., 2024-12-11
    }

    public function addBorrower()
    {
        // Validation logic
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:borrowers,email',
            'membership_type' => 'required|string',
        ]);

        Borrower::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'membership_type' => $this->membership_type,
            'date_joined' => $this->date_joined,
        ]);

        $this->reset();

        flash()->success('Borrower added successfully!');
        return redirect()->route('borrowers.index');
    }

    public function render()
    {
        return view('livewire.borrowers.add-borrower')->layout('layouts.app');
    }
}
