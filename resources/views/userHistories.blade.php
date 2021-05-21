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
@if(!empty($histories))
    <h1>Транзакции пользователей</h1>
    @foreach($histories as $history)
        <ul>
            <li>ID: {{$history['id']}}"></li>
            <li>ID Пользователя: {{$history['user_id']}}"></li>
            <li>Баланс: {{$history['balance']}}</li>
            <li>Value: {{$history['value']}}</li>
            <li>Дата: {{$history['created_at']}}</li>
        </ul>
    @endforeach
@else
    <h1>Пусто :(</h1>
@endif

</body>
</html>