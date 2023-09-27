<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/homepage.css">
    <title>Login Page</title>
</head>
<body>
    <header>
        <h1>Welcome to Sweeft-library</h1>
    </header>
    <div class="author-list">
        <h1>Please log in with Admin account to continue</h1>
        <form class="auth-form" style="" action="/login" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="enter your username" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
            </div>
            @error('name')
            <div class="alert-danger">{{ $message }}</div>
            @enderror

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="enter your password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror">
            </div>
            @error('password')
            <div class="alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn-blue" type="submit">Log in</button>
            <a href="/register">Don't have an account?</a>
        </form>
    </div>
</body>
</html>