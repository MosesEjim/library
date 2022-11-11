<nav>
    <div class="brand">
        <h3><a href="{{route('home')}}">Books Ville</a></h3>
    </div>
    
    <ul>
        @if(Auth::check())
        @if(Auth::user()->role === "librarian")
        <li><a href="{{route('book.all.borrowed')}}">All Borrowed books</a></li>
        <li><a href="{{route('book.create')}}">Upload books</a></li>
        @else
        <li><a href="{{route('book.borrowed')}}">Borrowed books</a></li>
        @endif
       
        <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
        <li><button onclick="document.getElementById('logout-form').submit()" class="nav-btn">Logout</button></li>
       
        <li><img src="/storage/files/{{Auth::user()->avatar}}" style="border-radius: 40%" height="40px", width="50px"></li>
        @endif

        @if(!Auth::check())
            <li><a href="{{route('login.get')}}">Login</a></li>
            <li><a href="{{route('signup.get')}}">Signup</a></li>
        @endif
    </ul>
  </nav> 