<?php
// Variable Scope Example

$globalVar = "I am a global variable";

function testScope() {
    $localVar = "I am a local variable";
    echo $localVar; // This will work
    //echo $globalVar; // This will cause an error
    echo $GLOBALS['globalVar']; // This will work
}

testScope();
?>
