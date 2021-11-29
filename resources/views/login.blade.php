<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page.css">
    <title>login</title>
</head>
<body>
    <div>
        <div>
            <h1 style="intem:center">Login</h1>
            @if (session('status'))
                    {{ session('status') }}
            @endif
            <form action="{{ route('login_api') }}" method="post">
                @csrf
                <input type="email" name="email" id=""><br>
                <input type="password" name="password" id=""><br>
                <input type="submit" id="">
            </form>
        </div>
    </div>
</body>
</html>