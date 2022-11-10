@extends('layout.app')

@section('content')
<div class="container">
       
    <div class="card shadow-none bg-light">
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
@endsection