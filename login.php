<?php
 require('init.php');

    // do login
    if (isset($_POST['submit'])) {

        // ambil variabel dari post
        $username = getUserPass($_POST['username']);
        $password = getUserPass($_POST['password']);

        // check login user pass
        $login = checkLogin($username, $password);
        if ($login!=false) {
            $_SESSION['login']=true;
            $_SESSION['id']=$login['id'];
            $_SESSION['username']=$login['username'];
            $_SESSION['role']=$login['role'];
            
            header("Location: dashboard/index.php");
        } else {
            $error = true;
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGW Phone Store - Login</title>

    <link rel="shortcut icon" href="assets/img/agw-icon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style-login.css">
</head>

<body>
    <div class="form-signin">
        <h1 class="title my-3">AGW Phone Store</h1>
        <form method="post">
            <ul>
                <li>
                    <img src="assets/img/agw.jpg" class="img-thumbnail border-0">
                </li>
                <?php if (isset($error)) : ?>
                <p class="error">Username / Password Salah</p>
                <?php endif; ?>
                <li>
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                        autocomplete="off">
                </li>
                <li>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <li>
                    <div class="form-group form-check">
                        <label for="check">
                            <input type="checkbox" name="remember" id="check">
                            remember me
                        </label>
                    </div>
                </li>
                <li>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                </li>
            </ul>
        </form>
        <div class="footer text-center mb-3">Made with <i class="fas fa-heart"></i> by <a
                href="https://github.com/klp5-PBW-D" target="blank">Kelompok 5</a>
        </div>
    </div>
</body>

</html>