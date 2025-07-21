<!-- Find the errors in this PHP program:
 print 'How are you?';
 print 'I'm fine.';
 ??>
 2. Write a PHP program that computes the total cost of this restaurant meal: two
 hamburgers at $4.95 each, one chocolate milkshake at $1.95, and one cola at 85
 cents. The sales tax rate is 7.5%, and you left a pre-tax tip of 16%.
 3. Modify your solution to the previous exercise to print out a formatted bill. For
 each item in the meal, print the price, quantity, and total cost. Print the pre-tax
 food and drink total, the post-tax total, and the total with tax and tip. Make sure
 that prices in your output are vertically aligned.
 4. Write a PHP program that sets the variable $first_name to your first name and
 $last_name to your last name. Print out a string containing your first and last
 name separated by a space. Also print out the length of that string.
 5. Write a PHP program that uses the increment operator (++) and the combined
 multiplication operator (*=) to print out the numbers from 1 to 5 and powers of
 2 from 2 (21) to 32 (25).
 6. Add comments to the PHP programs you’ve written for the other exercises. Try
 both single and multiline comments. After you’ve added the comments, run the
 programs to make sure they work properly and your comment syntax is correct. -->


<?php

# Exercise 1: Print statements
print 'How are you?';
print 'I\'m fine.';

# Exercise 2: Calculate total cost of a restaurant meal
$hamburger_price = 4.95;
$milkshake_price = 1.95;
$cola_price = 0.85;
$hamburger_quantity = 2;
$milkshake_quantity = 1;
$cola_quantity = 1;
$subtotal = ($hamburger_price * $hamburger_quantity) + ($milkshake_price * $milkshake_quantity) + ($cola_price * $cola_quantity);
$tax = $subtotal * 0.075;
$tip = $subtotal * 0.16;
$total = $subtotal + $tax + $tip;


# Exercise 3: Print formatted bill
echo "Item                Price  Quantity  Total\n";
echo "Hamburger          $hamburger_price  $hamburger_quantity  " . ($hamburger_price * $hamburger_quantity) . "<br>";
echo "Chocolate Milkshake $milkshake_price  $milkshake_quantity  " . ($milkshake_price * $milkshake_quantity) . "<br>";
echo "Cola               $cola_price  $cola_quantity  " . ($cola_price * $cola_quantity) . "<br>";
echo "-----------------------------------------<br>";
echo "Subtotal:          $subtotal <br>";
echo "Tax:               $tax<br>";
echo "Tip:               $tip<br>";
echo "Total:             $total<br>";



# Exercise 4: Print first and last name

$first_name = 'Praise';
$last_name = 'Praise';
$full_name = $first_name . ' ' . $last_name;
echo "Full Name: $full_name<br>";
echo "Length: " . strlen($full_name) . "<br>";
# Exercise 5: Print numbers and powers of 2
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i, Power of 2: " . (2 ** $i) . "<br>";
}

?>