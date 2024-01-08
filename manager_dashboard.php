<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './Inc/head.php' ?>
</head>

<body>
    <?php include './Inc/header.php' ?>
    <?php include './Inc/sidebar2.php' ?>
    <main id="main" class="main">
        <div style="display: flex; justify-content: space-between; align-items: center;" class="pagetitle">
            <div>
                <h1>Signup</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
                        <!-- <li class="breadcrumb-item">Users</li> -->
                        <li class="breadcrumb-item active">Signup</li>
                    </ol>
                </nav>
            </div>
            <div style="font-size: 18px;"><span>Date: <?php echo date("d-m-Y"); ?></span></div>
        </div>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <!-- 
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Sharafat</span>
                                </a>
                            </div>End Logo -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Signup to Your Account</h5>
                                        <p class="text-center small">Enter your username, email & password to signup</p>
                                    </div>
                                    <?php
                                    // Display the error message
                                    if ($error_message !== "") {
                                        echo '<div class="alert alert-danger">' . $error_message . '</div>';
                                    }
                                    if (isset($_SESSION['success_message'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                        // Remove the success message from the session to avoid displaying it on subsequent visits
                                        unset($_SESSION['success_message']);
                                    }
                                    ?>
                                    <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="col-12">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" required>
                                            <div class="invalid-feedback">Please enter your name</div>
                                        </div>
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
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                                            <div class="invalid-feedback">Please enter your confirm password!</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" class="form-select" id="role" required>
                                                <option value="" disabled selected>Select your role</option>
                                                <option value="admin">Admin</option>
                                                <option value="manager">Manager</option>
                                                <option value="cashier">Cashier</option>
                                                <option value="salesman">Salesman</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                            <div class="invalid-feedback">Please select your role</div>
                                        </div>
                                        <!-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Signup</button>
                                        </div>
                                        <!-- <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                            <div class="credits">
                                Designed by <a href="#">Atta</a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include './Inc/footer.php' ?>
</body>

</html>