<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($history['result']['id']))
        <h1>Баланс пользователя</h1>
        <ul>
            <li>ID: {{$history['result']['id']}}</li>
            <li>Баланс: {{$history['result']['balance']}}</li>
            <li>Дата: {{$history['result']['created_at']}}</li>
        </ul>
    @else
        <h1>Пусто :(</h1>
    @endif

</body>
</html>