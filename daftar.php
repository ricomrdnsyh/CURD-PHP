<?php 

require 'functions.php';

if( isset($_POST["daftar"]) ) {

    if(daftar($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Mendaftar');
                document.location.href = 'login.php';
            </script>
        ";
    }else {
        echo mysqli_error($conn);
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
                <a href="#!">
                    <img src="./img/logo.jpeg" alt="BootstrapBrain Logo" width="75" height="75">
                </a>
                </div>
                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign Up your account</h2>
                <form action="" method="POST">
                <div class="row gy-2 overflow-hidden">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="username" class="form-control" name="username" id="username" placeholder="Username" required>
                            <label for="username" class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            <label for="password" class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" required>
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="d-grid my-3">
                        <button class="btn btn-primary btn-lg" name="daftar" type="submit">Sign up</button>
                    </div>
                    </div>
                    <div class="col-12">
                    <p class="m-0 text-secondary text-center">Do you Have an account? <a href="login.php" class="link-primary text-decoration-none">Sign in</a></p>
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