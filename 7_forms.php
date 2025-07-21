<!-- What does $_POST look like when the following form is submitted with the third
 option in the Braised Noodles menu selected, the first and last options in the
 Sweet menu selected, and 4 entered into the text box?
 -->

 <?php
// Simulating the $_POST array after form submission
$_POST = array(
    'noodle' => 'shredded ginger and green onion',
    'sweet' => array('puff', 'cake'),
    'sweet_q' => '4',
    'submit' => 'Order'
);
// Displaying the simulated $_POST array
echo "<pre>";
print_r($_POST);
echo "</pre>";
// The output will show the structure of the $_POST array as it would appear after the form submission


//   Write a process_form() function that prints out all submitted form parameters
//  and their values. You can assume that form parameters have only scalar values.
function process_form($form_data) {
    foreach ($form_data as $key => $value) {
        if (is_array($value)) {
            echo "$key: " . implode(", ", $value) . "<br>";
        } else {
            echo "$key: $value<br>";
        }
    }
}
process_form($_POST); // Call the function to process the simulated form data
echo "<br>";


// Write a program that does basic arithmetic. Display a form with text box inputs
//  for two operands and a <select> menu to choose an operation: addition, sub
// traction, multiplication, or division. Validate the inputs to make sure that they
//  are numeric and appropriate for the chosen operation. The processing function
//  should display the operands, the operator, and the result. For example, if the
//  operands are 4 and 2 and the operation is multiplication, the processing function
//  should display something like 4 * 2 = 8.

function process_arithmetic_form($num1, $num2, $operation) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "Both inputs must be numeric.<br>";
        return;
    }

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            $operator = '+';
            break;
        case 'subtract':
            $result = $num1 - $num2;
            $operator = '-';
            break;
        case 'multiply':
            $result = $num1 * $num2;
            $operator = '*';
            break;
        case 'divide':
            if ($num2 == 0) {
                echo "Cannot divide by zero.<br>";
                return;
            }
            $result = $num1 / $num2;
            $operator = '/';
            break;
        default:
            echo "Invalid operation selected.<br>";
            return;
    }

    echo "$num1 $operator $num2 = $result<br>";
}
// Simulating form submission for arithmetic operation
$_POST = array(
    'num1' => '4',
    'num2' => '2',
    'operation' => 'multiply'
);
process_arithmetic_form($_POST['num1'], $_POST['num2'], $_POST['operation']);
echo "<br>";


// Write a program that displays, validates, and processes a form for entering infor
// mation about a package to be shipped. The form should contain inputs for the
//  from and to addresses for the package, dimensions of the package, and weight of
//  the package. The validation should check (at least) that the package weighs no
//  more than 150 pounds and that no dimension of the package is more than 36
//  inches. You can assume that the addresses entered on the form are both US
//  addresses, but you should check that a valid state and a zip code with valid syntax
//  are entered. The processing function in your program should print out the infor
// mation about the package in an organized, formatted report.


function process_shipping_form($from_address, $to_address, $dimensions, $weight) {
    // Validate weight
    if (!is_numeric($weight) || $weight > 150) {
        echo "Error: Package weight must be numeric and no more than 150 pounds.<br>";
        return;
    }

    // Validate dimensions
    foreach ($dimensions as $dimension) {
        if (!is_numeric($dimension) || $dimension > 36) {
            echo "Error: Each dimension must be numeric and no more than 36 inches.<br>";
            return;
        }
    }

    // Print formatted report
    echo "Shipping Information:<br>";
    echo "From Address: $from_address<br>";
    echo "To Address: $to_address<br>";
    echo "Dimensions (inches): " . implode(" x ", $dimensions) . "<br>";
    echo "Weight: $weight pounds<br>";
}
// Simulating form submission for shipping information

$_POST = array(
    'from_address' => '123 Main St, Springfield, IL 62701',
    'to_address' => '456 Elm St, Springfield, IL 62702',
    'dimensions' => array(12, 24, 36),
    'weight' => 50
);

process_shipping_form(
    $_POST['from_address'],
    $_POST['to_address'],
    $_POST['dimensions'],
    $_POST['weight']
);
echo "<br>";

?>
