<?php
   require  "config.php";


    if(isset($_POST['submit']) && $_POST['submit'] === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

            $query = $conn -> prepare("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

            $query -> execute(); //thuc thi ham $query

            $count = $query -> fetchColumn();

            if($count == "1") {
                $_SESSION['username'] = $username;
                header('location: student.php');
            } else {
                $message = 'username and password wrong!';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>login</title>
</head>
<body>
    <div class="login-page">
        <div class="form" >
            <form class="login-form" method="post" action="">
                <?php
                if(isset($message)) : ?>
                    <div class="alert alert-warning">
                        <?php echo $message; ?>
                    </div>
                <?php endif ?>
                <input type="text" placeholder="username" name="username"/>
                <input type="password" name="password" id="password" placeholder="password">
                <button type="submit" name="submit" value="login">login</button>
            </form>
        </div>
    </div>
</body>
</html>