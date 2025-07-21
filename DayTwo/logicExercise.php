 <!-- 1. Without using a PHP program to evaluate them, determine whether each of
 these expressions is true or false:
 a. 100.00 - 100
 b. "zero"
 c. "false"
 d. 0 + "true"
 e. 0.000
 f. "0.0"
 g. strcmp("false","False")
 h. 0 <=> "0"
 2. Without running it through the PHP engine, figure out what this program prints:
 $age = 12;
 $shoe_size = 13;
 if ($age > $shoe_size) {
 print "Message 1.";
 } elseif (($shoe_size++) && ($age > 20)) {
 print "Message 2.";
 } else {
 print "Message 3.";
 }
 print "Age: $age. Shoe Size: $shoe_size";
 3. Use while() to print a table of Fahrenheit and Celsius temperature equivalents
 from –50 degrees F to 50 degrees F in 5-degree increments. On the Fahrenheit
 temperature scale, water freezes at 32 degrees and boils at 212 degrees. On the
 Celsius scale, water freezes at 0 degrees and boils at 100 degrees. So, to convert
 from Fahrenheit to Celsius, you subtract 32 from the temperature, multiply by 5,
 and divide by 9. To convert from Celsius to Fahrenheit, you multiply by 9, divide
 by 5, and then add 32.
 4. Modify your answer to Exercise 3 to use for() instead of while(). -->

 <?php
 // question one
    $a = 100.00 - 100; // true, evaluates to 0
    $b = "zero"; // false, non-empty string
    $c = "false"; // true, non-empty string
    $d = 0 + "true"; // true, evaluates to 1
    $e = 0.000; // true, evaluates to 0
    $f = "0.0"; // true, non-empty string   
    $g = strcmp("false", "False"); // true, returns 1 (case-sensitive comparison)
    $h = 0 <=> "0"; // true, evaluates to 0 (
    // spaceship operator compares 0 with 0)
    print "a: $a, b: $b, c: $c, d: $d, e: $e, f: $f, g: $g, h: $h\n";
    // question two
    $age = 12;
    $shoe_size = 13;
    if ($age > $shoe_size) {
        print "Message 1.\n";
    } elseif (($shoe_size++) && ($age > 20)) {
        print "Message 2.\n";
    } else {
        print "Message 3.\n";
    }
    print "Age: $age. Shoe Size: $shoe_size\n";
    // question three
    $fahrenheit = -50;
    print "Fahrenheit\tCelsius\n";
    while ($fahrenheit <= 50) {
        $celsius = ($fahrenheit - 32) * 5 / 9;
        print "$fahrenheit\t\t$celsius\n";
        $fahrenheit += 5; // Increment by 5 degrees
    }
    // question four
    print "Fahrenheit\tCelsius\n";
    for ($fahrenheit = -50; $fahrenheit <= 50; $fahrenheit += 5) {
        $celsius = ($fahrenheit - 32) * 5 / 9;
        print "$fahrenheit\t\t$celsius\n";
    }
        $i++;
    
 ?>