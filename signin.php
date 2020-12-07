<?php
session_start();
include_once('functions.php');

$userdata = new DB_con();

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $userdata->signin($uname, $password);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fullname'];
        echo "<script>alert('Login Successful!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="assets/fontawesome-free-5.15.1-web/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/cssme.css">
    <title>Sign In</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 conainer-fluid">
            <span style="font-size:30px">Sign In</span>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="ml-auto" style="font-size: 30px;"></span>
        </nav>
    </div>
    <div class="container  col-auto mt-5">
        <form method="post">
            <div class="box">
                <h1>Sign In</h1>
                <img src="assets/image/user.svg">
                <input type="text"  id="username" name="username" placeholder="Username">
                <span id="usernameavailable"></span>
                <img src="assets/image/password.svg">
                <input type="password"  id="password" name="password" placeholder="Password">
                <input class="btn-green" name="login" type="submit" value="ล็อคอิน"><br>
                    <a href="register.php" style=" color: black;">Register</a></span>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>