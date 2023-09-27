<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Home Page</title>
</head>
<body>
    <header>
        <h1>Welcome to Sweeft-library</h1>
    </header>

    <main>
        @foreach ($books as $book)
        <div>
            <div class="book-card">
                <div>
                    <h2>Book Title: {{ $book->name }}</h2>
                    <h2>Book Release date: {{ $book->release_date }}</h2>
                </div>
                <div class="book-card-actions">
                    <a href="/edit/{{ $book->id }}">Edit</a>
                    <form method="POST" action="/delete/{{ $book->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
            <div class="book-card-authors">
                @foreach ($book->authors as $author)
                <h2>{{ $author->name }}</h2>
                @endforeach
            </div>
        </div>
        @endforeach
    </main>
</body>
</html>