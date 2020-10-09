Message sent!
<?php 
session_start();
echo "\n name: " . $_SESSION['name'];
echo "\n email: " . $_SESSION['email'];
echo "\n message: " . $_SESSION['message'];
echo "\n my email: " . $_SESSION['my-email'];
echo "\n accepted?: " . $_SESSION['accepted'];
?>