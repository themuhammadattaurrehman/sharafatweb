<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './Inc/connection.php';
    $sql =  "SELECT data.*, salesman.name as userName
    FROM data
    JOIN salesman ON data.userId = salesman.id";
    $stmt = $conn->query($sql);
    include './Inc/valid_session.php';
    include './Inc/head.php' ?>

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
            <section class=" d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <!-- <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"> -->
                    <!-- 
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Sharafat</span>
                                </a>
                            </div>End Logo -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> -->

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                        <th>
                                            5000
                                        </th>
                                        <th>1000</th>
                                        <th>500</th>
                                        <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                                        <th>100</th>
                                        <th>75</th>
                                        <th>50</th>
                                        <th>20</th>
                                        <th>10</th>
                                        <th>5</th>
                                        <th>2</th>
                                        <th>1</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($stmt->rowCount() > 0) {
                                        // echo "<table border='1'>";
                                        // echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>User Name</th><th>Email</th><th>Date of Birth</th><th>Referral Code</th></tr>";

                                        // Fetch data as associative array
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row["userName"] . "</td>";
                                            echo "<td>" . $row["5000"] . "</td>";
                                            echo "<td>" . $row["1000"] . "</td>";
                                            echo "<td>" . $row["500"] . "</td>";
                                            echo "<td>" . $row["100"] . "</td>";
                                            echo "<td>" . $row["75"] . "</td>";
                                            echo "<td>" . $row["50"] . "</td>";
                                            echo "<td>" . $row["20"] . "</td>";
                                            echo "<td>" . $row["10"] . "</td>";
                                            echo "<td>" . $row["5"] . "</td>";
                                            echo "<td>" . $row["2"] . "</td>";
                                            echo "<td>" . $row["1"] . "</td>";
                                            echo "<td>" . $row["tamount"] . "</td>";
                                            echo "<td>" . $row["date"] . "</td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                        // echo "</table>";
                                    } else {
                                        echo "No records found";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                    <!-- </div>
                    </div> -->
                </div>
            </section>
        </div>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include './Inc/footer.php' ?>
</body>

</html>