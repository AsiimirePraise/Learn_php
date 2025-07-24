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

 $age = 12;
 $shoe_size = 13;
 if ($age > $shoe_size) {
 print "Message 1.";
 } elseif (($shoe_size++) && ($age > 20)) {
 print "Message 2.";
 } else {
 print "Message 3.";
 }
 print "Age: $age. Shoe Size: $shoe_size"
?>
