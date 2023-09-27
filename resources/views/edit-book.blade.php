<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/homepage.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Welcome to Sweeft-library</h1>
    </header>
    <form action="/edit/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="author-list">
            <div class="input-flex">
                <h3>Book name:</h3>
                <input placeholder="name" type="text" name="name" value="{{ $book->name }}" class="@error('name') is-invalid @enderror">
            </div>
            @error('name')
            <div class="alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-flex">
                <h3>Book release-date:</h3>
                <input placeholder="release_date" type="number" name="release_date" value="{{ $book->release_date }}" class="@error('release_date') is-invalid @enderror">
            </div>
            @error('release_date')
            <div class="alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-flex">
                <h3>Book status:</h3>
                <select name="status">
                    <option value="available">available</option>
                    <option value="taken">taken</option>
                </select>
            </div>

            <div class="input-flex @error('authors') is-invalid @enderror">
                <h3>authors:</h3>
                <div>
                @foreach ($authors as $author)
                    @if ($book->authors->contains($author))
                    <div>
                        <input type="checkbox" name="authors[]" value="{{ $author->id }}" checked>
                        <label> {{ $author->name }}</label>
                    </div>
                    @else
                    <div>
                        <input type="checkbox" name="authors[]" value="{{ $author->id }}">
                        <label> {{ $author->name }}</label>
                    </div>
                    @endif
                @endforeach
                @error('authors')
                <div class="alert-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            
        <button class="btn-green" type="submit">Accept changes</button>
        <a class="btn-blue" href="/">Back home</a>
    </form>
</body>
</html>