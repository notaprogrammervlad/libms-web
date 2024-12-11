<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use Carbon\Carbon;  // Ensure to import Carbon

class EditBook extends Component
{
    public $book;
    public $title;
    public $author;
    public $genre;
    public $shelf_code;
    public $published_date;
    public $copies_available;

    protected $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'shelf_code' => 'required|string|max:50',
        'published_date' => 'required|date',
        'copies_available' => 'required|integer|min:1',
    ];

    public function mount($bookId)
    {
        $this->book = Book::find($bookId);
        if ($this->book) {
            $this->title = $this->book->title;
            $this->author = $this->book->author;
            $this->genre = $this->book->genre;
            $this->shelf_code = $this->book->shelf_code;
            // Ensure published_date is cast to Carbon
            $this->published_date = Carbon::parse($this->book->published_date)->format('Y-m-d');
            $this->copies_available = $this->book->copies_available;
        } else {
            session()->flash('error', 'Book not found!');
            return redirect()->route('books.index');
        }
    }

    public function submit()
    {
        $this->validate();

        $this->book->update([
            'title' => $this->title,
            'author' => $this->author,
            'genre' => $this->genre,
            'shelf_code' => $this->shelf_code,
            'published_date' => $this->published_date,
            'copies_available' => $this->copies_available,
        ]);

        flash()->success('Book updated successfully!');
        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.books.edit-book')->layout('layouts.app');
    }
}
