Message sent!
<?php 
session_start();
echo 'name: ' . $_SESSION['name'];
echo 'email: ' . $_SESSION['email'];
echo 'message: ' . $_SESSION['message'];
echo 'my email: ' . $_SESSION['my-email'];
?>