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
                        <div class="col">
                            <form action="{{route('book.checkin', $book->id)}}" method="post" id="checkin">
                                @csrf
                                @method("PUT")
                            </form>
                            <input type="button" value="checkin" class="btn btn-danger" onclick="document.getElementById('checkin').submit()">
                        </div>
                        <div class="col due-date">
                            @php 
                            $due_date = date_create($book->checkout_date);
                            date_add($due_date, date_interval_create_from_date_string("10 days"));
                            $time_remaining = date_diff(new DateTime(), $due_date);
                            $time_remaining = $time_remaining->format("%R%a");
                            @endphp
                            @if(intval($time_remaining)>0)
                            <p>Due Date: {{date_format($due_date, 'd-F-Y')}}</p>
                            <p>Remaining: {{$time_remaining}} days</p>
                            @else
                            <p>Date Due, Please return this book</p>
                            @endif
                            
                        </div>
                    
                    @endif
               @endif
                
            </div>
        </div>
        @endforeach  
    </div>
  </div>  
@endsection