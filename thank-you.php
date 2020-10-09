Message sent!
<?php 
session_start();
echo '\nname: ' . $_SESSION['name'];
echo '\nemail: ' . $_SESSION['email'];
echo '\nmessage: ' . $_SESSION['message'];
echo '\nmy email: ' . $_SESSION['my-email'];
echo '\naccepted?: ' . $_SESSION['accepted'];
?>