<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;

class AddBook extends Component
{
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

    public function submit()
    {
        $this->validate();

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'genre' => $this->genre,
            'shelf_code' => $this->shelf_code,
            'published_date' => $this->published_date,
            'copies_available' => $this->copies_available,
        ]);

        flash()->success('Book added successfully!');
        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.books.add-book')->layout('layouts.app');
    }
}
