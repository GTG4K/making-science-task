<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/homepage.css">
    <title>Home Page</title>
</head>
<body>
    <header>
        <h1>Welcome to Sweeft-library</h1>
    </header>

    <div class="author-list">
        <h1>Author list</h1>
        @foreach ($authors as $author)
            <div class="author-list-item">
                <h2>Name: {{ $author->name }}</h2>
                <div class="book-card-actions">
                    <a class="btn-blue" href="authors/{{ $author->id }}">Edit</a>
                    <form action="/authors/{{ $author->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn-red" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        <a class="btn-green" href="/authors/add">Add author</a>
        <a class="btn-blue" href="/">Go back</a>
    </div>
</body>
</html>