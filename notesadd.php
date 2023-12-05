<?php include './Inc/valid_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './Inc/head.php' ?>

</head>

<body>


  <?php include './Inc/header.php' ?>
  <?php include './Inc/sidebar.php' ?>
  <main id="main" class="main">

  <div style="display: flex; justify-content: space-between; align-items: center;" class="pagetitle">
    <div>
        <h1>Notes Count</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="notesadd.php">Home</a></li>
                <!-- <li class="breadcrumb-item">Users</li> -->
                <li class="breadcrumb-item active">Notes Count</li>
            </ol>
        </nav>
    </div>
    <div style="font-size: 18px;"><span>Date: <?php echo date("d-m-Y"); ?></span></div>
</div>

<!-- End Page Title -->


    <?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['notes_submit'])) {
        // Form for petrol expense

        $fiveThousand = $_POST['5000'];
        $thousand = $_POST['1000'];
        $fiveHundred = $_POST['500'];
        $oneHundred = $_POST['100'];
        $seventyFive = $_POST['75'];
        $fifty = $_POST['50'];
        $twenty = $_POST['20'];
        $ten = $_POST['10'];
        $five = $_POST['5'];
        $two = $_POST['2'];
        $one = $_POST['1'];

        // Perform calculations for product results
        $productResult1 = 5000 * $fiveThousand;
        $productResult2 = 1000 * $thousand;
        $productResult3 = 500 * $fiveHundred;
        $productResult4 = 100 * $oneHundred;
        $productResult5 = 75 * $seventyFive;
        $productResult6 = 50 * $fifty;
        $productResult7 = 20 * $twenty;
        $productResult8 = 10 * $ten;
        $productResult9 = 5 * $five;
        $productResult10 = 2 * $two;
        $productResult11 = 1 * $one;

        // Perform calculations for product results
        $totalSum = $productResult1 + $productResult2 + $productResult3 + $productResult4 + $productResult5 + $productResult6 + $productResult7 + $productResult8 + $productResult9 + $productResult10 + $productResult11;
        $id = $_SESSION['id'];
        // Calculate the total sum

        $sql = "INSERT INTO data (`userid`, `5000`, `1000`, `500`, `100`, `75`, `50`, `20`, `10`, `5`, `2`, `1`, `tamount`) 
VALUES ('$id','$fiveThousand', '$thousand', '$fiveHundred', '$oneHundred', '$seventyFive', '$fifty', '$twenty', '$ten', '$five', '$two', '$one', '$totalSum')";

        // Insert the values into the database or perform other actions as needed
        // Replace the following lines with your database insertion code
        // $your_database_connection = mysqli_connect("your_host", "your_username", "your_password", "your_database");
        // $sql = "INSERT INTO your_table_name (petrol, 1000, 500, productResult1, productResult2, productResult3, totalSum) 
        //         VALUES ('$petrol', '$1000', '$500', '$productResult1', '$productResult2', '$productResult3', '$totalSum')";

        // Execute the SQL query or perform other database actions as needed
        // $result = mysqli_query($your_database_connection, $sql);

        // Check if the query was successful and display a message
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $status1 = true;
          $message2 = "Notes count submitted successfully!";
        } else {
          $status1 = false;
          $message2 = "Error submitting expense. Please try again.";
        }
      } elseif (isset($_POST['expense_submit'])) {
        // Form for repair expense
        $petrol = $_POST['petrol'];
        $repair = $_POST['repair'];
        $maintenance = $_POST['mantenance'];  // corrected typo in variable name
        $challan = $_POST['challan'];
        $description = $_POST['description'];
        $id = $_SESSION['id'];
        // Your database connection credentials
        $totalSum = $petrol + $repair + $maintenance + $challan;
        // SQL query to insert data into the database
        $sql = "INSERT INTO expense (userid, petrol, repair, maintenance, challan, description, tamount) 
            VALUES ('$id', '$petrol', '$repair', '$maintenance', '$challan', '$description', $totalSum)";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful and display a message
        if ($result) {
          $status12 = true;
          $message21 = "Expense submitted successfully!";
        } else {
          $status12 = false;
          $message21 = "Error submitting expense. Please try again.";
        }
      }
      // Close the database connection if opened
      // mysqli_close($your_database_connection);
    }


    ?>




    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Notes</h5>

              <form method="post" action="users-profile.php">
                <script>
                  function calculateProduct(labelValue, inputId, resultId) {
                    // Get the input value
                    var inputValue = document.getElementById(inputId).value;

                    // Update the result on the page
                    document.getElementById(resultId).innerText = labelValue * inputValue;
                    calculateTotalSum();
                    // Update the total sum
                    updateTotalSum();
                  }

                  function calculateTotalSum() {
                    var inputIds = ['5000', '1000', '500', '100', '75', '50', '20', '10', '5', '2', '1'];
                    var totalSum = 0;

                    inputIds.forEach(function(id) {
                      var quantity = parseFloat(document.getElementById(id).value) || 0;
                      totalSum += quantity;
                    });

                    document.getElementById('totalSum12').innerText = totalSum;
                  }

                  function updateTotalSum() {
                    // Calculate the total sum
                    totalSum = 0;
                    for (var i = 1; i <= 11; i++) {
                      var result = parseFloat(document.getElementById('productResult' + i).innerText) || 0;
                      totalSum += result;
                    }

                    // Display the total sum
                    document.getElementById('totalSum').innerText = totalSum;
                  }
                </script>
                </script>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">5000</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="5000" name="5000" class="form-control" oninput="calculateProduct(5000, '5000', 'productResult1')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult1" class="row mt-2"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">1000</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="1000" name="1000" class="form-control" oninput="calculateProduct(1000, '1000', 'productResult2')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult2" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">500</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="500" name="500" class="form-control" oninput="calculateProduct(500, '500', 'productResult3')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult3" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">100</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="100" name="100" class="form-control" oninput="calculateProduct(100, '100', 'productResult4')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult4" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">75</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="75" name="75" class="form-control" oninput="calculateProduct(75, '75', 'productResult5')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult5" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">50</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="50" name="50" class="form-control" oninput="calculateProduct(50, '50', 'productResult6')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult6" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">20</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="20" name="20" class="form-control" oninput="calculateProduct(20, '20', 'productResult7')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult7" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">10</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="10" name="10" class="form-control" oninput="calculateProduct(10, '10', 'productResult8')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult8" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">5</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="5" name="5" class="form-control" oninput="calculateProduct(5, '5', 'productResult9')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult9" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">2</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="2" name="2" class="form-control" oninput="calculateProduct(2, '2', 'productResult10')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult10" class="row mt-2"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">1</label>
                  <label for="inputText" class="col-sm-2 col-form-label"> * </label>
                  <div class="col-sm-2">
                    <input type="number" id="1" name="1" class="form-control" oninput="calculateProduct(1, '1', 'productResult11')">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label"> = </label>
                  <div class="col-sm-2">
                    <span id="productResult11"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-5 col-form-label">Total Sum:</label>
                  <div class="col-sm-3">
                    <span id="totalSum12" class="row mt-2"></span>
                  </div>
                  <div class="col-sm-2">
                    <span id="totalSum" class="row mt-2"></span>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <!-- <button type="submit" name="expense_submit" class="btn btn-primary">Submit Button</button> -->
                    <input type="submit" name="notes_submit" value="Submit" class="btn btn-primary">
                  </div>
                </div>
                <?php
                if (isset($status1)) {
                  if ($status1 == true) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>
                        <?= $message2 ?>
                      </strong>

                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>
                        <?= $message2 ?>
                      </strong>
                    </div>
                <?php
                  }
                }
                ?>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Expense</h5>
              <form method="post" action="users-profile.php">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Petrol</label>
                  <div class="col-sm-8">
                    <input type="number" name="petrol" class="form-control" oninput="calculateSum()">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Repair</label>
                  <div class="col-sm-8">
                    <input type="number" name="repair" class="form-control" oninput="calculateSum()">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Maintenance</label>
                  <div class="col-sm-8">
                    <input type="number" name="maintenance" class="form-control" oninput="calculateSum()">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Challan</label>
                  <div class="col-sm-8">
                    <input type="number" name="challan" class="form-control" oninput="calculateSum()">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Total Sum</label>
                  <div class="col-sm-8">
                    <span id="totalSum1" class="row m-2">0</span>
                  </div>
                </div>

                <!-- JavaScript code to calculate the sum -->
                <script>
                  function calculateSum() {
                    // Get the values from the input fields
                    var petrol = parseFloat(document.getElementsByName("petrol")[0].value) || 0;
                    var repair = parseFloat(document.getElementsByName("repair")[0].value) || 0;
                    var maintenance = parseFloat(document.getElementsByName("maintenance")[0].value) || 0;
                    var challan = parseFloat(document.getElementsByName("challan")[0].value) || 0;

                    // Calculate the sum
                    var sum = petrol + repair + maintenance + challan;

                    // Display the sum in the totalSum element
                    document.getElementById("totalSum1").innerText = sum;
                  }
                </script>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="description" style="height: 100px"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <!-- <button type="submit" name="expense_submit" class="btn btn-primary">Submit Button</button> -->
                    <input type="submit" name="expense_submit" value="Submit Expense" class="btn btn-primary">
                  </div>
                </div>
                <?php
                if (isset($status12)) {
                  if ($status12 == true) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>
                        <?= $message21 ?>
                      </strong>

                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>
                        <?= $message21 ?>
                      </strong>
                    </div>
                <?php
                  }
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include './Inc/footer.php' ?>
</body>

</html>