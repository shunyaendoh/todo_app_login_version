<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログイン</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="./assets/js/app.js" defer></script>
</head>
<body>
  <h1 class="bg-primary text-center">ログイン</h1>
  <form action="./LoginController.php" method="POST" class="text-center">
    <?php if (isset($_SESSION['login'])):?>
    <p class="text-danger">ユーザー名またはパスワードが間違っています</p>
    <?php endif; ?>
    <p class="mt-4">ユーザー名</p>
    <input type="text" name="username" placeholder="username">
​
    <p class="mt-2">パスワード</p>
    <input type="password" name="password" placeholder="password" class="ml-5">
​
    <input type="submit" value="送信">
  </form>
  <div class="text-center mt-2">
    <a href="./signup.php">サインアップ</a>
  </div>
</body>
</html>
