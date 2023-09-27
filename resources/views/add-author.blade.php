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

    <form action="/authors" method="post">
        @csrf
        <div class="author-list">
            <h1>Author Details</h1>
            <div class="input-flex">
                <h2>Name: </h2>
                <input type="text" name='name' placeholder="name" class="@error('name') is-invalid @enderror">
            </div>
            @error('name')
            <div class="alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn-green" type="submit">Accept Changes</button>
            <a class="btn-blue" href="/authors">Back to authors list</a>
        </div>
    </form>
</body>
</html>