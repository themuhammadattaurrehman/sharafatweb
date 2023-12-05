<?php

include './Inc/connection.php';
session_start();
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user inputs
   

    // Replace this with your actual authentication logic
    // Get user inputs
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Escape user inputs to prevent SQL injection

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT id, name,email,password FROM salesman WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $name, $dbemail, $dbpassword);

    if ($stmt->fetch()) {
        // Verify the password
        if ($dbemail == $username && $dbpassword == $password) {
            // Authentication successful
            $_SESSION["loggedin"] = true;
            $_SESSION["name"] = $name;
            $_SESSION['id'] = $id; // Set a session variable to indicate the user is logged in
            header("Location: notesadd.php"); // Redirect to the dashboard
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Invalid username or password";
    }

    // Close the connection
    $stmt->close();
    $conn->close();
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