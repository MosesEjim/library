<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookSearch extends Component
{
    public $search = '';

    public function render()
    {
        // render only books that have not been borrowed
        if($this->search === ''){
            $books = Book::where('checked_out', 0)->get();
            return view('livewire.book-search')
                ->with('books', $books);
        }

        $books = Book::where('checked_out', 0)
                        ->where('title', 'like', '%'.$this->search.'%')
                        ->orWhere('isbn', 'like', '%'.$this->search.'%')
                        ->orWhere('publisher', 'like', '%'.$this->search.'%')
                        ->orWhere('date_added_to_library', 'like', '%'.$this->search.'%')
                        ->get();
                        
        return view('livewire.book-search')
                ->with('books', $books);
    }
}
