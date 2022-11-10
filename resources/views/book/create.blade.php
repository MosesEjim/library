@extends('layout.app')

@section('content')
<div class="container">
       
    <div class="card shadow-none bg-light">
        <h3>Upload A Book</h3>
        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                <input type="text" 
                    name="title" 
                    placeholder="Title" 
                    value="{{old('title')}}"
                    id="title"
                    class="@error('title') is-invalid @enderror form-control">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                @error('isbn')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" 
                name="isbn" 
                placeholder="ISBN"
                value="{{old('isbn')}}"
                id="isbn"
                class="@error('isbn') is-invalid @enderror form-control">

               
            </div>
            <div class="mb-3">
                <label for="revision_number" class="form-label">Revision Number</label>
                @error('revision_number')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" 
                name="revision_number" 
                placeholder="Revision Number"
                value="{{old('revision_number')}}"
                id="revision_number"
                class="@error('revision_number') is-invalid @enderror form-control">

            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                @error('publisher')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" 
                name="publisher" 
                placeholder="Publisher"
                value="{{old('publisher')}}"
                id="publisher"
                class="@error('publisher') is-invalid @enderror form-control">

            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                @error('published_date')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="date" 
                name="published_date" 
                placeholder="Published Date"
                value="{{old('published_date')}}"
                id="published_date"
                class="@error('published_date') is-invalid @enderror form-control">

            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author(s)</label>
                @error('author')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" 
                name="author" 
                placeholder="Author(s). Seperate multiple authors with a comma"
                value="{{old('author')}}"
                id="author"
                class="@error('author') is-invalid @enderror form-control">

            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                @error('genre')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" 
                name="genre" 
                placeholder="Genre"
                value="{{old('genre')}}"
                id="genre"
                class="@error('genre') is-invalid @enderror form-control">

            </div>
            
            <div class="mb-3">
                <label for="cover_photo" class="form-label">Cover Photo</label>
                @error('cover_photo')
                <div class="error">{{ $message }}</div>
                @enderror
                <input type="file" 
                name="cover_photo" 
                id="cover_photo"
                class="@error('cover_photo') is-invalid @enderror form-control">

            </div>
            <div class="btn">
                <input type="submit" value="signup" class="btn btn-primary">
            </div>
        </form>
        
    </div>
</div>
@endsection