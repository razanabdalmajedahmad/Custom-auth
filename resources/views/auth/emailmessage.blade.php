<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verify</title>
    <style>
        .body{
            margin: auto;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="body">
        <h1>Hello {{$details['name']}} ...</h1>
        <h1>your code is {{$details['code']}} ...</h1>
    </div>
</body>
</html>
