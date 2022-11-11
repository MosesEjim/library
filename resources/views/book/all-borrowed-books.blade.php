@extends('layout.app')

@section('content')
<div class="book-container">
    <div class="row align-items-center">
        @foreach ($books as $book)
        <div class="col-5 shadow-sm p-3 mb-5 bg-light rounded book-col" style="background-image: url(/storage/files/{{$book->cover_photo}})">
            <div class="row align-items-start book-detail">
                <div class="book-title">
                    {{$book->title}}
                </div>
                <div class="book-title">
                    Author: {{$book->author}}
                </div>
            </div>
            <div class="row align-items-end">
               
                        <div class="col borrower">
                            <img src="/storage/files/{{$book->borrower->avatar}}" style="border-radius: 50%" width="50px" height="50px">
                            <p>Borrowed By: {{$book->borrower->username}}</p>
                            <p>Email: {{$book->borrower->email}}</p>
                        </div>
                        <div class="col due-date">
                            
                            @php 
                            $check_out_date = date_create($book->checkout_date);
                            $due_date = date_create($book->checkout_date);
                            date_add($due_date, date_interval_create_from_date_string("10 days"));
                            $time_remaining = date_diff(new DateTime(), $due_date);
                            $time_remaining = $time_remaining->format("%R%a");
                            @endphp
                            @if(intval($time_remaining)>0)
                            <p>Checkout date: {{date_format($check_out_date, 'd-F-Y')}}</p>
                            <p>Due Date: {{date_format($due_date, 'd-F-Y')}}</p>
                            <p>Remaining: {{$time_remaining}} days</p>
                            @else
                            {{-- convert negative days to positive by multiplying by -1 and then display --}}
                            <p>Date Overdue by {{$time_remaining*-1}} days</p>
                            @endif
                            
                        </div>
                    
                        
                
            </div>
        </div>
        @endforeach  
    </div>
  </div>  
@endsection