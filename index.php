<?php
$result = ''; // Default value for the result

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        // Performing the calculation based on the selected operator
        if ($operator == '+') {
            $result = $num1 + $num2;
        } elseif ($operator == '-') {
            $result = $num1 - $num2;
        } elseif ($operator == '*') {
            $result = $num1 * $num2;
        } elseif ($operator == '/') {
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Error: Division by Zero";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        /* Calculator Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .my-calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
        }
        .my-input {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        .my-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .my-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .my-button:hover {
            background-color: #45a049;
        }
        .my-result {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="my-calculator">
    <form method="post" action="">
        <!-- Numeric inputs and operation selector -->
        <input type="number" name="num1" class="my-input" placeholder="First Number" required>
        <select name="operator" class="my-input" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="num2" class="my-input" placeholder="Second Number" required>

        <button type="submit" name="submit" class="my-button">Calculate</button>
    </form>

    <!-- Display the result -->
    <div class="my-result">
        <?php
        if ($result !== '') {
            echo 'Result: ' . $result;
        }
        ?>
    </div>
</div>

</body>
</html>
