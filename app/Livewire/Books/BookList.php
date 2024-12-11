<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class BookList extends Component
{
    use WithPagination;

    public $confirmingDelete = false;
    public $bookIdBeingDeleted;

    protected $listeners = ['destroy' => 'destroy'];

    public function render()
    {
        $books = Book::paginate(10);
        return view('livewire.books.book-list', compact('books'))->layout('layouts.app');
    }

    public function confirmDelete($bookId)
    {
        $this->confirmingDelete = true;
        $this->bookIdBeingDeleted = $bookId;
    }

    public function destroy()
    {
        $book = Book::findOrFail($this->bookIdBeingDeleted);
        $book->delete();
        $this->confirmingDelete = false;
        flash()->success('Book deleted successfully!');
    }
}