<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Calculation</title>
    <script>
        function calculateProduct(labelValue, inputId, resultId) {
            // Get the input value
            var inputValue = document.getElementById(inputId).value;

            // Update the result on the page
            document.getElementById(resultId).innerText = labelValue * inputValue;
        }
    </script>
</head>

<body>
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">5000</label>
        <label for="inputText" class="col-sm-2 col-form-label"> * </label>
        <div class="col-sm-2">
            <input type="text" id="petrol" name="petrol" class="form-control" oninput="calculateProduct(5000, 'petrol', 'productResult')">
        </div>
        <label for="inputText" class="col-sm-2 col-form-label"> = </label>
        <div class="col-sm-2">
            <span id="productResult"></span>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">1000</label>
        <label for="inputText" class="col-sm-2 col-form-label"> * </label>
        <div class="col-sm-2">
            <input type="text" id="1000" name="1000" class="form-control" oninput="calculateProduct(1000, '1000', 'productResult2')">
        </div>
        <label for="inputText" class="col-sm-2 col-form-label"> = </label>
        <div class="col-sm-2">
            <span id="productResult2"></span>
        </div>
    </div>
</body>

</html>



<div class="row mb-3">
    <div class="col-sm-10">
        <!-- <button type="submit" name="expense_submit" class="btn btn-primary">Submit Button</button> -->
        <input type="submit" name="expense_submit" value="Submit Expense" class="btn btn-primary">
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