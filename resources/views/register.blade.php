<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div>
        <div>
            <h1>Register</h1>
            <form action="{{ route('register_api') }}" method="post">
                @csrf
                <input type="text" name="name" id="name"><br>
                <input type="text" name="last_name" id="last_name"><br>
                <input type="email" name="email" id="email"><br>
                <input type="password" name="password" id="password"><br>
                <input type="submit" value="">
            </form>
        </div>
    </div>
</body>
</html>