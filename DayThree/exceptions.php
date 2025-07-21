<?php
// Exception handling example
try {
    // Code that may throw an exception
    throw new Exception("An error occurred");
} catch (Exception $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage();
}


# classes and exceptions
class CustomException extends Exception {
    public function errorMessage() {
        // Error message
        return "Error on line {$this->getLine()} in {$this->getFile()}: {$this->getMessage()}";
    }
}
try {
    // Code that may throw a custom exception
    throw new CustomException("This is a custom exception");
} catch (CustomException $e) {
    // Handle the custom exception
    echo $e->errorMessage();
}

// Example of a function that throws an exception
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Division by zero is not allowed");
    }
    return $numerator / $denominator;
}

?>