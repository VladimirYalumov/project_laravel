<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<form action="sign_in" method="GET">
    <p>Зарегистрироваться  <input type="submit" value="Отправить"></p>
    <p>Введите логин <input type="text" name="login"></p>
    <p>Введите пароль <input type="text" name="password"></p>
    <p>Кем вы хотите быть </p>
    <select name = "status">
        <option value="admin">Администратор</option>
        <option value="user">Пользователь</option>
    </select>
</form>
</body>
</html>
