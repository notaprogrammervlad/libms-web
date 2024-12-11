<?php

use App\Livewire\Books\BookList;
use App\Livewire\Books\AddBook;
use App\Livewire\Books\EditBook;
use App\Livewire\Books\BookTransactionList;
use App\Livewire\Borrowers\BorrowerList;
use App\Livewire\Borrowers\AddBorrower;
use App\Livewire\Borrowers\EditBorrower;
use App\Livewire\LoanManagement\LoanList;
use App\Livewire\LoanManagement\AddLoan;
use App\Livewire\LoanManagement\ReturnedLoans;

use Illuminate\Support\Facades\Route;



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//Books
Route::get('/books', BookList::class)->name('books.index');
Route::get('/books/add', AddBook::class)->name('books.add');
Route::get('/books/edit/{bookId}', EditBook::class)->name('books.edit');
Route::get('/books/transactions', BookTransactionList::class)->name('books.transactions');

// Borrowers
Route::get('/borrowers', BorrowerList::class)->name('borrowers.index');
Route::get('/borrowers/add', AddBorrower::class)->name('borrowers.add');
Route::get('/borrowers/edit/{borrowerId}', EditBorrower::class)->name('borrowers.edit');

//Loans
Route::get('/loans', LoanList::class)->name('loans.index');
Route::get('/loans/add', AddLoan::class)->name('loans.add');
Route::get('/returned-loans', ReturnedLoans::class)->name('returned.loans');


require __DIR__.'/auth.php';


