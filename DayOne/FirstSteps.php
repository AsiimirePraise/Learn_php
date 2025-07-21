<html>

<head>
    <title>PHP says hello</title>
</head>

<body>
    <b>
        <?php
        echo "Hello, World!";

        // This is a comment
        echo "<br>";
        #variables 
        $name = "Praise";
        $age = 30;
        echo "My name is $name and I am $age years old.";

        echo "<br>";
        // data types
        $isStudent = true; // boolean
        $height = 5.9; // float
        $skills = array("PHP", "JavaScript", "HTML"); // array
        echo "I am a student: " . ($isStudent ? "Yes" : "No") . "<br>";
        echo "My height is $height feet.<br>";
        echo "My skills are: " . implode(", ", $skills) . ".";
        echo "<br>";
        #to get data types
        echo "The type of name is: " . gettype($name) . "<br>";
        var_dump($age);
        echo "<br>";

        #string manipulation
        $greeting = "Hello, $name!";
        echo $greeting . "<br>";
        $greetingLength = strlen($greeting); #length of string
        echo "The length of the greeting is: $greetingLength characters.<br>";
        $greetingUpper = strtoupper($greeting); // convert to uppercase
        echo "Uppercase greeting: $greetingUpper<br>";
        $greetingLower = strtolower($greeting); // convert to lowercase
        echo "Lowercase greeting: $greetingLower<br>";
        $greetingReplaced = str_replace("World", "PHP", $greeting); // replace text
        echo "Replaced greeting: $greetingReplaced<br>";
        $greetingTrimmed = trim($greeting); // trim whitespace
        echo "Trimmed greeting: $greetingTrimmed<br>";
        $greetingExploded = explode(", ", $greeting); // split string into array
        echo "Exploded greeting: ";
        print_r($greetingExploded);
        echo "<br>";
        $greetingSliced = substr($greeting, 0, 5); // slice string
        echo "<br>Sliced greeting: $greetingSliced<br>";
        echo "<br>";

        #type casting
        $numberString = "123";
        $number = (int)$numberString; // cast string to integer
        echo "The number is: $number<br>";
        $floatString = "123.45";
        $floatNumber = (float)$floatString; // cast string to float
        echo "The float number is: $floatNumber<br>";

        #php mathematics
        $a = 10;
        $b = 5;
        echo "Addition: " . ($a + $b) . "<br>";
        echo "Min_value: " . min($a, $b) . "<br>";

        #php constants
        define("PI", 3.14);
        echo "The value of PI is: " . PI . "<br>";
        echo "The value of PI is: " . constant("PI") . "<br>";

        #magic constants
        echo "The current file is: " . __FILE__ . "<br>";
        echo "The current line is: " . __LINE__ . "<br>";
        echo "The current directory is: " . __DIR__ . "<br>";
        // echo "The current function is: " . __FUNCTION__ . "<br>";

        #operators
        $x = 10;
        $y = 20;
        echo "Addition: " . ($x + $y) . "<br>";
        echo "Subtraction: " . ($x - $y) . "<br>";
        echo "Multiplication: " . ($x * $y) . "<br>";
        echo "Division: " . ($x / $y) . "<br>";
        echo "Modulus: " . ($x % $y) . "<br>";
        echo "Exponentiation: " . ($x ** 2) . "<br>";
        echo "Increment: " . (++$x) . "<br>";
        echo "Decrement: " . (--$y) . "<br>";
        echo "Comparison: " . ($x == $y ? "Equal" : "Not Equal") . "<br>";
        echo "Logical AND: " . (($x > 5 && $y < 30) ? "True" : "False") . "<br>";
        echo "Logical OR: " . (($x < 5 || $y > 10) ? "True" : "False") . "<br>";


        #conditional statements
        if ($age >= 18) {
            echo "You are an adult.<br>";
        } else {
            echo "You are a minor.<br>";
        }
        if ($isStudent) {
            echo "You are a student.<br>";
        } else {
            echo "You are not a student.<br>";
        }

        #nested if statements
        if ($age >= 18) {
            if ($isStudent) {
                echo "You are an adult student.<br>";
            } else {
                echo "You are an adult non-student.<br>";
            }
        } else {
            echo "You are a minor.<br>";
        }

        #php switch statement
        $day = "Monday";
        switch ($day) {
            case "Monday":
                echo "Today is Monday.<br>";
                break;
            case "Tuesday":
                echo "Today is Tuesday.<br>";
                break;
            case "Wednesday":
                echo "Today is Wednesday.<br>";
                break;
            case "Thursday":
                echo "Today is Thursday.<br>";
                break;
            case "Friday":
                echo "Today is Friday.<br>";
                break;
            default:
                echo "It's the weekend!<br>";
        }

        #loops
        echo "Counting from 1 to 5:<br>";
        for ($i = 1; $i <= 5; $i++) {
            echo $i . " ";
        }
        echo "<br>";
        echo "Counting down from 5 to 1:<br>";
        for ($i = 5; $i >= 1; $i--) {
            echo $i . " ";
        }
        echo "<br>";
        echo "Counting using while loop:<br>";
        $j = 1;
        while ($j <= 5) {
            echo $j . " ";
            $j++;
        }
        echo "<br>";
        echo "Counting using do-while loop:<br>";
        $k = 1;
        do {
            echo $k . " ";
            $k++;
        } while ($k <= 5);

        echo "<br>";
        #foreach loop   
        echo "My skills are:<br>";
        foreach ($skills as $skill) {
            echo $skill . "<br>";
        }
        echo "<br>";

        #break and continue
        echo "Using break in a loop:<br>";
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 6) {
                break; // exit the loop when i is 6
            }
            echo $i . " ";
        }
        echo "<br>";
        echo "Using continue in a loop:<br>";
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2 == 0) {
                continue; // skip even numbers
            }
            echo $i . " ";
        }
        ?>
    </b>
</body>

</html>