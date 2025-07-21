<?php
function sayHello($name) {
    echo "Hello, $name!";
}

function addNumbers($a, $b) {
    return $a + $b;
}

function getMax($x, $y) {
    return ($x > $y) ? $x : $y;
}

function isEven($num) {
    return ($num % 2 == 0);
}

echo "<b>";
# Example usage of functions    
sayHello("Alice");
echo "<br>";
echo "Sum of 5 and 10 is: " . addNumbers(5, 10) . "<br>";
echo "Max of 20 and 15 is: " . getMax(20, 15) . "<br>";
echo "Is 4 even? " . (isEven(4) ? "Yes" : "No") . "<br>";
?>