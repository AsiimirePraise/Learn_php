<?php
$cookie_name = "user";
$cookie_value = "praise";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
<!-- modify the cookie again by setcookie -->
 <!-- To delete a cookie, use the setcookie() function with an expiration date in the past -->

</body>
</html>