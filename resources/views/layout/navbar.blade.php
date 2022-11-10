<nav>
    <div class="brand">
        <h3>Books Ville</h3>
    </div>
    <div class="search">
        <input type="search" name="search" id="search" placeholder="Search Books By Name, ISBN, Date, Publisher" class="form-control search">
    </div>
    <ul>
        @if(Auth::check())
        <li><a href="{{route('login.get')}}">Borrowed books</a></li>
        @if(Auth::user()->role === "librarian")
        <li><a href="{{route('book.create')}}">Upload books</a></li>
        @endif
        @endif
        @if(!Auth::check())
            <li><a href="{{route('login.get')}}">Login</a></li>
            <li><a href="{{route('signup.get')}}">Signup</a></li>
        @endif
    </ul>
  </nav> 