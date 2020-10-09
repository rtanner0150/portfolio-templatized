<?php

require "vendor/autoload.php";
session_start();
$errors = "";

$myemail = "rtanner0150@skilledkc.org";
// if(!isset($_POST["submit"]))
// {
//     $errors .= "\n Not submitted?";
// }

if(empty($_POST["contact-name"]) || empty($_POST["contact-email"]) || empty($_POST["contact-message"]))

{

$errors .= "\n Error: all fields are required";

}

$name = $_POST["contact-name"];

$email_address = $_POST["contact-email"];

$message = $_POST["contact-message"];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))

{

$errors .= "\n Error: Invalid email address";

}

if( empty($errors))
{

$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";

$email_obj = new \SendGrid\Mail\Mail();
$email_obj->setFrom($email_address, $name);
$email_obj->setSubject($email_subject);
$email_obj->addTo($myemail, "Ryan Tanner");
$email_obj->addContent("text/plain",$email_body);
$sendgrid = new \SendGrid(getenv["SENDGRID_API_KEY"]);

$accepted = mail($to,$email_subject,$email_body,$headers);

//redirect to the ‘thank you’ page
$_SESSION['name'] = $name;
$_SESSION['email'] = $email_address;
$_SESSION['message'] = $message;
$_SESSION['my-email'] = $myemail;
$_SESSION['accepted'] = $accepted;
header("Location: thank-you.php");

}
else
{
$_SESSION['errors'] = $errors;
header("Location: error.php");
}
?>