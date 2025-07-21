<?php 
// DayTwo logic file
//  true or false 

// use if() to check if the user is logged in
// and set the variable $isLoggedIn accordingly
$isLoggedIn = false; // Default value
if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true; // User is logged in
} else {
    $isLoggedIn = false; // User is not logged in
}

// use if() to check if the user is an admin
// and set the variable $isAdmin accordingly
$isAdmin = false; // Default value
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    $isAdmin = true; // User is an admin
} else {
    $isAdmin = false; // User is not an admin
}

if ($isLoggedIn) {
    print "Welcome aboard, trusted user.";
} else {
    print "Howdy, stranger.";
}


// These values are compared using dictionary order
 if ("x54321"> "x5678") {
 print 'The string "x54321" is greater than the string "x5678".';
 } else {
 print 'The string "x54321" is not greater than the string "x5678".';
 }
 // These values are compared using numeric order
 if ("54321" > "5678") {
 print 'The string "54321" is greater than the string "5678".';
 } else {
 print 'The string "54321" is not greater than the string "5678".';
 }


 #comparing with strcmp()
 if (strcmp("x54321", "x5678") > 0) {
     print 'The string "x54321" is greater than the string "x5678".';
 } else {
     print 'The string "x54321" is not greater than the string "x5678".';
 }
    if (strcmp("54321", "5678") > 0) {
        print 'The string "54321" is greater than the string "5678".';
    } else {
        print 'The string "54321" is not greater than the string "5678".';
    }


    #using spaceship operator(for any datatype compared to strcmp())
    if ("x54321" <=> "x5678" > 0) {
        print 'The string "x54321" is greater than the string "x5678".';
    } else {
        print 'The string "x54321" is not greater than the string "x5678".';
    }
    if ("54321" <=> "5678" > 0) {
        print 'The string "54321" is greater than the string "5678".';
    } else {
        print 'The string "54321" is not greater than the string "5678".';
    }

    #while loop
    $i = 0;
    while ($i < 5) {
        print "The value of i is: $i\n";
        $i++;
    }

    #for loop
    for ($i = 0; $i < 5; $i++) {
        print "The value of i is: $i\n";
    }


    
?>