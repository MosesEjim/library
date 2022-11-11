<div class="row align-items-start">
    <div class="col-12">
        <div class="search">
            <input wire:model="search" type="search" name="search" id="searchbar" placeholder="Search Books By Name, ISBN, Date, Publisher" class="form-control search">
        </div>
    </div>
    
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
                            <form action="{{route('book.checkout', $book->id)}}" method="post" id="checkout">
                                @csrf
                                @method("PUT")
                            </form>
                            <input type="button" value="checkout" class="btn btn-success" onclick="document.getElementById('checkout').submit()">
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
