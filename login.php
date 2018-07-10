<?php
    include 'config.php';


    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $conn -> prepare("SELECT COUNT('id') FROM `user` where `username` = '$username' AND 'password' = '$password'");
        $query -> execute();
        $count = $query -> fetchColumn();

        if($count == "1") {
            $_SESSION['username'] = $username;
            header('location: student.php');
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>login</title>
</head>
<body>
    <div class="login-page">
        <div class="form" method="post" name="login">
            <form class="login-form">
                <input type="text" placeholder="username" name="username"/>
                <input type="password" name="pwd" id="password" placeholder="password">
                <button type="submit" name="login" value="login">login</button>
            </form>
        </div>
    </div>
</body>
</html>