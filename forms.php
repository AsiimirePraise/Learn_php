<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        Your name<input type="text" name='user'>
        <br>
        <button type="submit">submit</button>
    </form>
    <?php
    if ($_POST['user']) {
        print "Hello, ";
        // Print what was submitted in the form parameter called 'user'
        print $_POST['user'];
        print "!";
    } else {
        // Otherwise, print the form
        print <<<_HTML_
 <form method="post" action="$_SERVER[PHP_SELF]">
 Your Name: <input type="text" name="user" />
 <br/>
 <button type="submit">Say Hello</button>
 </form>
 _HTML_;
    }


     $zip = '6520';
 $month = 2;
 $day = 6;
 $year = 2007;
 printf("ZIP is %05d and the date is %02d/%02d/%d", $zip, $month, $day, $year);
 print ucwords(strtolower('JOHN FRANKENHEIMER'));
    ?>
</body>

</html>