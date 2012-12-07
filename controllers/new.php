<?php

$threadAuthor = trim($_POST['author']);
$threadTitle = trim($_POST['title']);
$threadPath = trim($_POST['path']);
$threadBody = trim($_POST['body']);

if(empty($threadBody))
	$error = "You should write something";

if(empty($threadPath))
	$error = "You need a path!";

if(empty($threadTitle))
	$error = "Where's the title friend?";
	
if(empty($threadAuthor))
	$error = "You need a username :(";		
	
if(preg_match("/^(fuck? you captcha?|fuck? captchas?|i hate captchas?|captchas?.*sucks?)$/i", $_POST["recaptcha_response_field"]))
	$_SESSION['bypassCaptcha'] = true;

$privatekey = '6LdKvAoAAAAAAIez9hqwneKdoB6k6TFHKmMIwWUB';
$resp = recaptcha_check_answer ($privatekey,
					$_SERVER["REMOTE_ADDR"],
					$_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);

if (!$resp->is_valid and !$_SESSION['bypassCaptcha'])
	$error = "You did the captcha wrong! Please try again.";


if(empty($error))
{
	include('../models/new.php');
}

?>
