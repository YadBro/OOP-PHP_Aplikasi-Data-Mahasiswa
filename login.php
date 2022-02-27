<?php
require_once "App/init.php";
session_start();


if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    if (mysqli_num_rows($user->Login()) === 1) {
        $row = mysqli_fetch_assoc($user->Login());
        if (password_verify($user->password, $row['password'])) {
            // set session
            $_SESSION['login'] = true;
            header('Location: index.php');
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>SISWA</title>
</head>

<body>

    <div class="container-">
        <div class="row">
            <div class="p-5">
                <center>
                    <div class="col-4">
                        <h1>LOGIN FORM</h1>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Submit</button>
                            <a href="register.php" class="btn btn-secondary">Register</a>
                        </form>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>