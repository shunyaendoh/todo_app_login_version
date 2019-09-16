<?php 
session_start();
if (!empty($_POST)) {
    if ($_POST['username'] == '') {
        $error['username'] = 'blank';
    }
    if (strlen($_POST['password']) < 4) {
        $error['password'] = 'length';
    }
    if(empty($error)) {
        $_SESSION['signup'] = $_POST;
        header('Location: ./SignupController.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>サインアップ</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./assets/js/app.js" defer></script>
</head>
<body>
    <h1 class="bg-primary text-center">サインアップ</h1>
    <form action="" method="post" class="text-center">
        <p class="mt-4">ユーザー名</p>
        <?php if (!empty($_POST)): ?>
        <?php if (isset($error['username']) == 'blank'): ?>
        <p class="text-danger">ユーザー名を入力してください</p>
        <?php endif; ?>
        <?php endif; ?>
        <input type="text" name="username" value="<?php if (isset($_POST['username'])):?><?php echo($_POST['username']); ?><?php endif;?>" placeholder="username">
        <p class="mt-2">パスワード</p>
        <?php if (!empty($_POST)): ?>
        <?php if (isset($error['password']) == 'length'): ?>
        <p class="text-danger">4文字以上のパスワードを入力してください</p>
        <?php endif;?>
        <?php endif;?>
        <input id="sign" type="password" name="password" placeholder="password" class="ml-5">    
        
        <input type="submit" value="登録">
    </form>
    <div class="text-center mt-2">
        <a href="./login.php">ログインはこちら</a>
    </div>
</body>
</html>