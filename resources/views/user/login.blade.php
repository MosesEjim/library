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
    <div class="container">
       
        <div class="card">
            <h3>Login</h3>
            <form action="{{route('login.post')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <input type="email" 
                    name="email" 
                    placeholder="email"
                    value="{{old('email')}}"
                    id="email"
                    class="@error('email') is-invalid @enderror form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <input type="password" 
                    name="password" 
                    placeholder="password"
                    value="{{old('password')}}"
                    id="password"
                    class="@error('password') is-invalid @enderror form-control">
                </div>
                <div class="btn">
                    <input type="submit" value="Login" class="btn btn-primary">
                </div>
            </form>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>