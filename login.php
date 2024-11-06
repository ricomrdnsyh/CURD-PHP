<?php 
session_start();
require'functions.php';

// cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }

}

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1 ){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
</head>
<body>
    <section class="bg-light py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card border border-light-subtle rounded-3 shadow-sm">
            <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="text-center mb-3">
                <a href="#">
                    <img src="./img/logo.jpeg" alt="BootstrapBrain Logo" width="75" height="75">
                </a>
                </div>
                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
                
                <?php if(isset($error) ) : ?>
                    <p align="center" style="color : red; font-style : italic;">username atau password salah</p>
                <?php endif; ?>

                <form action="" method="POST">
                <div class="row gy-2 overflow-hidden">
                    <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
                        <label for="username" class="form-label">Username</label>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="d-flex gap-2 justify-content-between">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="remember" id="remember">
                        <label class="form-check-label text-secondary" for="remember">
                            Remember me
                        </label>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="d-grid my-3">
                        <button class="btn btn-primary btn-lg" name="login" type="submit">Log in</button>
                    </div>
                    </div>
                    <div class="col-12">
                    <p class="m-0 text-secondary text-center">Don't have an account? <a href="daftar.php" class="link-primary text-decoration-none">Sign up</a></p>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>