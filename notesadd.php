<?php include './Inc/valid_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './Inc/head.php' ?>
  <style>
    .hidden {
      display: none;
    }
  </style>
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

    include './Inc/connection.php';
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

        $productResult1 = 0;
        $productResult2 = 0;
        $productResult3 = 0;
        $productResult4 = 0;
        $productResult5 = 0;
        $productResult6 = 0;
        $productResult7 = 0;
        $productResult8 = 0;
        $productResult9 = 0;
        $productResult10 = 0;
        $productResult11 = 0;

        if (!empty($fiveThousand)) {
          $productResult1 = 5000 * $fiveThousand;
      }
      
      if (!empty($thousand)) {
          $productResult2 = 1000 * $thousand;
      }
      
      if (!empty($fiveHundred)) {
          $productResult3 = 500 * $fiveHundred;
      }
      
      if (!empty($oneHundred)) {
          $productResult4 = 100 * $oneHundred;
      }
      
      if (!empty($seventyFive)) {
          $productResult5 = 75 * $seventyFive;
      }
      
      if (!empty($fifty)) {
          $productResult6 = 50 * $fifty;
      }
      
      if (!empty($twenty)) {
          $productResult7 = 20 * $twenty;
      }
      
      if (!empty($ten)) {
          $productResult8 = 10 * $ten;
      }
      
      if (!empty($five)) {
          $productResult9 = 5 * $five;
      }
      
      if (!empty($two)) {
          $productResult10 = 2 * $two;
      }
      
      if (!empty($one)) {
          $productResult11 = 1 * $one;
      }
   
        // Perform calculations for product results
        // $productResult1 = 5000 * $fiveThousand;
        // $productResult2 = 1000 * $thousand;
        // $productResult3 = 500 * $fiveHundred;
        // $productResult4 = 100 * $oneHundred;
        // $productResult5 = 75 * $seventyFive;
        // $productResult6 = 50 * $fifty;
        // $productResult7 = 20 * $twenty;
        // $productResult8 = 10 * $ten;
        // $productResult9 = 5 * $five;
        // $productResult10 = 2 * $two;
        // $productResult11 = 1 * $one;

        // Perform calculations for product results
        $totalSum = $productResult1 + $productResult2 + $productResult3 + $productResult4 + $productResult5 + $productResult6 + $productResult7 + $productResult8 + $productResult9 + $productResult10 + $productResult11;
        $id = $_SESSION['id'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO data (`userid`, `5000`, `1000`, `500`, `100`, `75`, `50`, `20`, `10`, `5`, `2`, `1`, `tamount`) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->bindParam(2, $fiveThousand, PDO::PARAM_INT);
        $stmt->bindParam(3, $thousand, PDO::PARAM_INT);
        $stmt->bindParam(4, $fiveHundred, PDO::PARAM_INT);
        $stmt->bindParam(5, $oneHundred, PDO::PARAM_INT);
        $stmt->bindParam(6, $seventyFive, PDO::PARAM_INT);
        $stmt->bindParam(7, $fifty, PDO::PARAM_INT);
        $stmt->bindParam(8, $twenty, PDO::PARAM_INT);
        $stmt->bindParam(9, $ten, PDO::PARAM_INT);
        $stmt->bindParam(10, $five, PDO::PARAM_INT);
        $stmt->bindParam(11, $two, PDO::PARAM_INT);
        $stmt->bindParam(12, $one, PDO::PARAM_INT);
        $stmt->bindParam(13, $totalSum, PDO::PARAM_INT);

        // Execute the prepared statement
        $result = $stmt->execute();

        // Check if the query was successful and display a message
        if ($result) {
          $status1 = true;
          $_SESSION['total2'] = $totalSum;
          $message2 = "Notes count submitted successfully!";
        } else {
          $status1 = false;
          $message2 = "Error submitting notes count. Please try again.";
        }

        // Close the statement
        $conn = null;
      } elseif (isset($_POST['expense_submit'])) {
        // Form for repair expense
        $petrol = $_POST['petrol'];
        $repair = $_POST['repair'];
        $maintenance = $_POST['maintenance'];  // corrected typo in variable name
        $challan = $_POST['challan'];
        $description = $_POST['description'];
        $id = $_SESSION['id'];
    
        $hbl4226Value = isset($_POST['hbl4226Checkbox']) ? $_POST['hbl4226Value'] : 0;
        $mcb4917Value = isset($_POST['mcb4917Checkbox']) ? $_POST['mcb4917Value'] : 0;
        $hbl3596Value = isset($_POST['hbl3596Checkbox']) ? $_POST['hbl3596Value'] : 0;
        $hbl4156Value = isset($_POST['hbl4156Checkbox']) ? $_POST['hbl4156Value'] : 0;
        $hbl714Value = isset($_POST['hbl714Checkbox']) ? $_POST['hbl714Value'] : 0;
        $mcb6139Value = isset($_POST['mcb6139Checkbox']) ? $_POST['mcb6139Value'] : 0;
        $ubl5216Value = isset($_POST['ubl5216Checkbox']) ? $_POST['ubl5216Value'] : 0;
        // Your database connection credentials
        $totalSum = 0;

        // Check and add each variable if it's numeric
        if (is_numeric($petrol)) {
            $totalSum += $petrol;
        }
        
        if (is_numeric($repair)) {
            $totalSum += $repair;
        }
        
        if (is_numeric($maintenance)) {
            $totalSum += $maintenance;
        }
        
        if (is_numeric($challan)) {
            $totalSum += $challan;
        }
        
        if (is_numeric($ubl5216Value)) {
            $totalSum += $ubl5216Value;
        }
        
        if (is_numeric($mcb6139Value)) {
            $totalSum += $mcb6139Value;
        }
        
        if (is_numeric($hbl714Value)) {
            $totalSum += $hbl714Value;
        }
        
        if (is_numeric($hbl4156Value)) {
            $totalSum += $hbl4156Value;
        }
        
        if (is_numeric($hbl3596Value)) {
            $totalSum += $hbl3596Value;
        }
        
        if (is_numeric($mcb4917Value)) {
            $totalSum += $mcb4917Value;
        }
        
        if (is_numeric($hbl4226Value)) {
            $totalSum += $hbl4226Value;
        }

        try {
        
          // Bind parameters
          $stmt = $conn->prepare("INSERT INTO expense (userid, petrol, repair, maintenance, challan, description, hbl4226, mcb4917, hbl3596, hbl4156, hbl714, mcb6139, ubl5216, tamount) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bindParam(1, $id, PDO::PARAM_INT);
$stmt->bindParam(2, $petrol, PDO::PARAM_INT);
$stmt->bindParam(3, $repair, PDO::PARAM_INT);
$stmt->bindParam(4, $maintenance, PDO::PARAM_INT);
$stmt->bindParam(5, $challan, PDO::PARAM_INT);
$stmt->bindParam(6, $description, PDO::PARAM_STR);
$stmt->bindParam(7, $hbl4226Value, PDO::PARAM_INT);
$stmt->bindParam(8, $mcb4917Value, PDO::PARAM_INT);
$stmt->bindParam(9, $hbl3596Value, PDO::PARAM_INT);
$stmt->bindParam(10, $hbl4156Value, PDO::PARAM_INT);
$stmt->bindParam(11, $hbl714Value, PDO::PARAM_INT);
$stmt->bindParam(12, $mcb6139Value, PDO::PARAM_INT);
$stmt->bindParam(13, $ubl5216Value, PDO::PARAM_INT);
$stmt->bindParam(14, $totalSum, PDO::PARAM_INT);
          // $stmt->bindParam(8, $habibbank, PDO::PARAM_STR);

          // Execute the prepared statement
          $stmt->execute();

          // Check if the query was successful and display a message
          $status12 = true;
          $_SESSION['total1'] = $totalSum;
          $message21 = "Expense submitted successfully!";
        } catch (PDOException $e) {
          $status12 = false;
          $message21 = "Error submitting expense. Please try again. " . $e->getMessage();
        }
      }

      // Close the database connection
      $conn = null;
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

              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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

                  function toggleInput(rowId) {
                    var inputLabel = document.getElementById(rowId + "Label");
                    var inputValue = document.getElementById(rowId + "Value");

                    // Toggle the "hidden" class based on checkbox state
                    if (document.getElementById(rowId + "Checkbox").checked) {
                      inputLabel.classList.remove("hidden");
                      inputValue.classList.remove("hidden");
                    } else {
                      inputLabel.classList.add("hidden");
                      inputValue.classList.add("hidden");
                    }
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
          <?php
          $totalSum = 0;

          if (isset($_SESSION['total1'])) {
            $totalSum += $_SESSION['total1'];
          }

          if (isset($_SESSION['total2'])) {
            $totalSum += $_SESSION['total2'];
          }

          echo "you give the amount of rs." . $totalSum;
          ?>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Expense</h5>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="row mb-3">
                  <label for="hbl4226" class="col-sm-3 col-form-label">HBL 4226</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="hbl4226Checkbox" name="hbl4226Checkbox" onchange="toggleInput('hbl4226')">
                  </div>
                  <label for="hbl4226Value" id="hbl4226Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="hbl4226Value" name="hbl4226Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="mcb4917" class="col-sm-3 col-form-label">MCB 4917</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="mcb4917Checkbox" name="mcb4917Checkbox" onchange="toggleInput('mcb4917')">
                  </div>
                  <label for="mcb4917Value" id="mcb4917Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="mcb4917Value" name="mcb4917Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="hbl3596" class="col-sm-3 col-form-label">HBL 3596</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="hbl3596Checkbox" name="hbl3596Checkbox" onchange="toggleInput('hbl3596')">
                  </div>
                  <label for="hbl3596Value" id="hbl3596Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="hbl3596Value" name="hbl3596Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="hbl4156" class="col-sm-3 col-form-label">HBL 4156</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="hbl4156Checkbox" name="hbl4156Checkbox" onchange="toggleInput('hbl4156')">
                  </div>
                  <label for="hbl4156Value" id="hbl4156Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="hbl4156Value" name="hbl4156Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="hbl714" class="col-sm-3 col-form-label">HBL 714</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="hbl714Checkbox" name="hbl714Checkbox" onchange="toggleInput('hbl714')">
                  </div>
                  <label for="hbl714Value" id="hbl714Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="hbl714Value" name="hbl714Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="mcb6139" class="col-sm-3 col-form-label">MCB 6139</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="mcb6139Checkbox" name="mcb6139Checkbox" onchange="toggleInput('mcb6139')">
                  </div>
                  <label for="mcb6139Value" id="mcb6139Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="mcb6139Value" name="mcb6139Value" class="hidden form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="ubl5216" class="col-sm-3 col-form-label">UBL 5216</label>
                  <div class="col-sm-2 mt-2">
                    <input type="checkbox" id="ubl5216Checkbox" name="ubl5216Checkbox" onchange="toggleInput('ubl5216')">
                  </div>
                  <label for="ubl5216Value" id="ubl5216Label" class="hidden col-sm-2 col-form-label">Rs</label>
                  <div class="col-sm-4">
                    <input type="number" id="ubl5216Value" name="ubl5216Value" class="hidden form-control">
                  </div>
                </div>
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

    // Check if the checkboxes are checked and add their values
    var hbl4226Value = document.getElementById("hbl4226Checkbox").checked ? parseFloat(document.getElementsByName("hbl4226Value")[0].value) || 0 : 0;
    var mcb4917Value = document.getElementById("mcb4917Checkbox").checked ? parseFloat(document.getElementsByName("mcb4917Value")[0].value) || 0 : 0;
    var hbl3596Value = document.getElementById("hbl3596Checkbox").checked ? parseFloat(document.getElementsByName("hbl3596Value")[0].value) || 0 : 0;
    var hbl4156Value = document.getElementById("hbl4156Checkbox").checked ? parseFloat(document.getElementsByName("hbl4156Value")[0].value) || 0 : 0;
    var hbl714Value = document.getElementById("hbl714Checkbox").checked ? parseFloat(document.getElementsByName("hbl714Value")[0].value) || 0 : 0;
    var mcb6139Value = document.getElementById("mcb6139Checkbox").checked ? parseFloat(document.getElementsByName("mcb6139Value")[0].value) || 0 : 0;
    var ubl5216Value = document.getElementById("ubl5216Checkbox").checked ? parseFloat(document.getElementsByName("ubl5216Value")[0].value) || 0 : 0;

    // Calculate the sum
    var sum = petrol + repair + maintenance + challan + hbl4226Value + mcb4917Value +
        hbl3596Value + hbl4156Value + hbl714Value + mcb6139Value + ubl5216Value;

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