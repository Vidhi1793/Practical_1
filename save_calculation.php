<?php
// Function to print numbers from 1 to 100 without using loops
function printNumbers($n) {
    if ($n <= 100) {
        echo $n . "<br>";
        printNumbers($n + 1);
    }
}

// Initialize result variable
$result = '';
$error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $operation = $_POST['operation'];

    // Validate inputs
    if (empty($input1) || empty($input2)) {
        $error = "Please fill in both input fields.";
    } else {
        $input1 = floatval($input1);
        $input2 = floatval($input2);

        // Perform the selected operation
        switch ($operation) {
            case 'summation':
                $result = "Result: " . ($input1 + $input2);
                break;
            case 'subtraction':
                $result = "Result: " . ($input1 - $input2);
                break;
            case 'multiplication':
                $result = "Result: " . ($input1 * $input2);
                break;
            case 'division':
                if ($input2 != 0) {
                    $result = "Result: " . ($input1 / $input2);
                } else {
                    $error = "Error: Division by zero is not allowed.";
                }
                break;
            case 'all':
                $result = "Summation: " . ($input1 + $input2) . "<br>" .
                          "Subtraction: " . ($input1 - $input2) . "<br>" .
                          "Multiplication: " . ($input1 * $input2) . "<br>";
                if ($input2 != 0) {
                    $result .= "Division: " . ($input1 / $input2);
                } else {
                    $result .= "Division: Division by zero is not allowed.";
                }
                break;
            default:
                $error = "Please select a valid operation.";
        }
    }
}
?>