<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{ 
    public function index(){
        $books = Book::where('checked_out', false)
                        ->get();
        return view('welcome')
            ->with('books', $books);
    }

    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:255',
            'isbn'=>'required|max:255',
            'revision_number'=>'required|max:255',
            'publisher'=>'required|max:255',
            'published_date'=>'required|date|before:tomorrow',
            'author'=>'required|max:255',
            'genre'=>'required|max:255',
            'cover_photo'=>'required|mimes:JPG,png,jpeg|max:2024'
        ]);

        try{
            $book = new Book();
            $book->title = $request->title;
            $book->isbn = $request->isbn;
            $book->revision_number = $request->revision_number;
            $book->publisher = $request->publisher;
            $book->published_date = $request->published_date;
            $book->author = $request->author;
            $book->genre = $request->genre;
            $book->date_added_to_library =  date('Y-m-d');

            //upload cover photo
            $file_name = pathinfo($request->file('cover_photo')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('cover_photo')->getClientOriginalExtension();

            $path = $request
                ->file('cover_photo')
                ->storeAs(
                    'public/files',
                    str_replace(' ', '_', date('ymdhis').strtolower($file_name)).".".$extension
                );

            $book->cover_photo = explode('/', $path)[2];
            
            $book->save();
            toastr()->success("Book uploaded successfully");
            return redirect()->route('home');
        }catch(\Exception $e){
            
            toastr()->error("Failed to upload book");
            return back();
        }
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('book.edit')
                ->with('book', $book);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required|max:255',
            'isbn'=>'required|max:255',
            'revision_number'=>'required|max:255',
            'publisher'=>'required|max:255',
            'published_date'=>'required|date|before:tomorrow',
            'author'=>'required|max:255',
            'genre'=>'required|max:255',
            'cover_photo'=>'required|mimes:jpg,png|max:2024'
        ]);

        try{
            $book = Book::find($id);
            $book->title = $request->title;
            $book->isbn = $request->isbn;
            $book->revision_number = $request->revision_number;
            $book->publisher = $request->publisher;
            $book->published_date = $request->published_date;
            $book->author = $request->author;
            $book->genre = $request->genre;
            $book->date_added_to_library = date('Y-m-d');

            //check if request contains a new cover photo
            if($request->hasFile('cover_photo')){
                //delete old cover photo
                $file = public_path().'\storage\files\\'.$book->cover_photo;
                if(File::isFile($file)){
                    File::delete($file);
                }

            //upload cover photo
            $filename = pathinfo($request->file('cover_photo')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $request->file('cover_photo')->getClientOriginalExtension();

            $path = $request
                ->file('cover_photo')
                ->storeAs(
                    'public/files',
                    str_replace(' ', '_', date('ymdhis').strtolower($filename)).".".$extension
                );
            //get the file name
            $book->cover_photo = explode('/', $path)[2];
                
            }

            $book->update();

            toastr()->success("Book Updated Successfully");
            return redirect()->route('home');
        }catch(\Exception $e){
            
            toastr()->error("Failed To Update Book");
            return back();
        }
    }
    // shows all books currently borrowed by a user
    public function user_books(){
        $user_books = Auth::user()->borrowed_books;
        return view('book.user-books')
                ->with('books', $user_books);
    }

    public function check_out($id){
        try{
            $book = Book::find($id);
            $book->checked_out = true;
            $book->borrower_id = Auth::id();
            $book->checkout_date = date('Y-d-m');
            $book->update();
            toastr()->success("Check Out Successful.");
            return back();
        }catch(\Exception){
            toastr()->error("failed to Check Out.");
            return back();
        }
        
    }
    
    public function check_in($id){
        try{
            $book = Book::find($id);
            $book->checked_out = false;
            $book->borrower_id = null;
            $book->checkout_date =null;
            $book->update();
            toastr()->success("Check In Successful.");
            return back();
        }catch(\Exception){
            toastr()->error("failed to Check In.");
            return back();
        }
        
    }

    public function all_borrowed_books(){
        $borrowed_books = Book::where('checked_out', true)->get();
        return view('book.all-borrowed-books')
                ->with('books', $borrowed_books);
    }
}
