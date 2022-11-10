<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('styles/style.css')}}">
    <title>Document</title>
</head>
<body>
   <nav>
    <div class="brand">
        <h3>Books Ville</h3>
    </div>
    <div class="search">
        <input type="search" name="search" id="search" placeholder="Search Books By Name, ISBN, Date, Publisher" class="form-control search">
    </div>
    <ul>
        <li><a href="{{route('login.get')}}">Borrowed books</a></li>
        <li><a href="{{route('login.get')}}">Upload books</a></li>
        <li><a href="{{route('login.get')}}">Login</a></li>
        <li><a href="{{route('signup.get')}}">Signup</a></li>
    </ul>
  </nav> 

  <div class="book-container">
    <div class="row align-items-start">
        <div class="col shadow-sm p-3 mb-5 bg-light rounded book-col">
            <div class="row align-items-start">
                <div class="book-title">
                    Book title
                </div>
            </div>
            <div class="row align-items-end">
                <div class="checkout">
                   <input type="button" value="checkout" class="btn btn-success">
                </div>
            </div>
        </div>
        <div class="col shadow-sm p-3 mb-5 bg-light rounded book-col">
            <div class="row align-items-start">
                <div class="book-title">
                    Book title
                </div>
            </div>
            <div class="row align-items-end">
                <div class="checkout">
                   <input type="button" value="checkout" class="btn btn-success">
                </div>
            </div>
        </div>
        <div class="col shadow-sm p-3 mb-5 bg-light rounded book-col">
            <div class="row align-items-start">
                <div class="book-title">
                    Book title
                </div>
            </div>
            <div class="row align-items-end">
                <div class="checkout">
                   <input type="button" value="checkout" class="btn btn-success">
                </div>
            </div>
        </div>
        <div class="col shadow-sm p-3 mb-5 bg-light rounded book-col">
            <div class="row align-items-start">
                <div class="book-title">
                    Book title
                </div>
            </div>
            <div class="row align-items-end">
                <div class="checkout">
                   <input type="button" value="checkout" class="btn btn-success">
                </div>
            </div>
        </div>
        
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>