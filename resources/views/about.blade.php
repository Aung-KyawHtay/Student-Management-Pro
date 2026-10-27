<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>

<body>
    <h1>{{$title}}</h1>
    <p>{{$message}}</p>

    <p>My name is {{$name}}</p>

    @if($title === 'About Students Management Pro')
    <p>About Page is active.</p>
    @else
    <p>Unknown Page.</p>
    @endif
</body>

</html>