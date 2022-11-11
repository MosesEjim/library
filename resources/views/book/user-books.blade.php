@extends('layout.app')

@section('content')
<div class="book-container">
    <div class="row align-items-start">
        @foreach ($books as $book)
        <div class="col-3 shadow-sm p-3 mb-5 bg-light rounded book-col" style="background-image: url(/storage/files/{{$book->cover_photo}})">
            <div class="row align-items-start book-detail">
                <div class="book-title">
                    {{$book->title}}
                </div>
                <div class="book-title">
                    Author: {{$book->author}}
                </div>
            </div>
            <div class="row align-items-end">
               @if(Auth::check())
                    @if(Auth::user()->role ==='reader')
                        <div>
                            <form action="{{route('book.checkin', $book->id)}}" method="post" id="checkin">
                                @csrf
                                @method("PUT")
                            </form>
                            <input type="button" value="checkin" class="btn btn-danger" onclick="document.getElementById('checkin').submit()">
                        </div>
                    @else
                     <div>
                        <a href="{{route('book.edit', $book->id)}}"  class="btn btn-secondary">edit</a>
                     </div>
                    @endif
               @endif
                
            </div>
        </div>
        @endforeach  
    </div>
  </div>  
@endsection