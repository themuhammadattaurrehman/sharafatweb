<?php

include './Inc/connection.php';
session_start();
$error_message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Check in admin table
    $sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$password'";
    if ($rs = mysqli_query($conn, $sql)) {
        if ($row = mysqli_fetch_assoc($rs)) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["role"] = "ADMIN";
            header('location:index.php');
        } else {
            // Check in cashier table
            $sql = "SELECT * FROM cashier WHERE email='$email' AND password='$password'";
            if ($rs = mysqli_query($conn, $sql)) {
                if ($row = mysqli_fetch_assoc($rs)) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["name"] = $row['name'];
                    $_SESSION["role"] = "CASHIER";
                    header('location:index.php');
                } else {
                    // Check in manager table
                    $sql = "SELECT * FROM manager WHERE email='$email' AND password='$password'";
                    if ($rs = mysqli_query($conn, $sql)) {
                        if ($row = mysqli_fetch_assoc($rs)) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $row['id'];
                            $_SESSION["name"] = $row['name'];
                            $_SESSION["role"] = "MANAGER";
                            header('location:index.php');
                        } else {
                            // Check in salesman table
                            $sql = "SELECT * FROM salesman WHERE email='$email' AND password='$password'";
                            if ($rs = mysqli_query($conn, $sql)) {
                                if ($row = mysqli_fetch_assoc($rs)) {
                                    session_start();
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $row['id'];
                                    $_SESSION["name"] = $row['name'];
                                    $_SESSION["role"] = "SALESMAN";
                                    header("Location: notesadd.php");
                                } else {
                                    $status = false;
                                    $message = "Wrong username and password. Please try again or contact administrator.";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- The rest of your HTML code -->

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './Inc/head.php' ?>
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>
                                    <?php
                                    // Display the error message
                                    if ($error_message !== "") {
                                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                                    }
                                    ?>
                                    <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                                <input type="email" name="email" class="form-control" id="email" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
    <?php include './Inc/footer.php' ?>
</body>

</html>