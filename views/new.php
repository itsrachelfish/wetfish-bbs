<?php

include('../shared/recaptchalib.php');

$content['title'] = "Make a new thread &mdash; " . $content['title'];
$content['heading'] = "Create a new thread";

ob_start();

if($_POST)
{		
	include('../controllers/new.php');
	$error = \NewThread\Controller::submit($_POST);
	
	if(empty($error))
	{
		$threadPath = preg_replace("{[^a-z0-9./-_()]+}i", "-", $_POST['path']);
		
		$content['heading'] = "Comment successful!";
		echo "You will now be redirected to your post...";
		echo "<meta http-equiv='refresh' content='2;url=/$threadPath'>";
	}
}

if(empty($_POST) or $error)
{
	if($error)
		echo "<div class='error'>$error</div>";
	
	?>

	<form method='post'>
		User Name: 
			<input name='author' value='<?php echo $_POST['author'] ?>'>
		Thread Title: 
			<input name='title' value='<?php echo $_POST['title'] ?>'>
		Thread Path: [<a href='#' title="This is the URL for your thread. Entering 'I love butts' here would create a new thread at <?php echo $_SERVER['SERVER_NAME'] ?>/i-love-butts">?</a>]
			<input name='path' value='<?php echo $_POST['path'] ?>'>
		Comment: 
			<textarea name='body'><?php echo $_POST['body'] ?></textarea>
			
		<?php if(empty($_SESSION['bypassCaptcha'])) { echo recaptcha_get_html('6LdKvAoAAAAAAJL5OzO8-dIXE43MoCHQ-Tf7XFWI'); } ?>
		
		<input type='submit' value='SUBMIT, BITCHES!'>
	</form>

	<?php
}

$content['body'] = ob_get_contents();
ob_end_clean();

?>
