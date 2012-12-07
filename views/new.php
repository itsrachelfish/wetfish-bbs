<?php

include('../shared/recaptchalib.php');

$content['title'] = "Make a new thread &mdash; " . $content['title'];
$content['heading'] = "Create a new thread";

ob_start();

if($_POST)
{
	?>
	
	<script>
		$(document).ready(function()
		{
			<?php
			foreach($_POST as $key => $value)
			{
				echo "$('input[name=\"$key\"]').val('".addslashes($value)."');";
			}
			?>
		});
	</script>
	
	<?php
	
	include('../controllers/new.php');
}

if(empty($_POST) or $error)
{
	if($error)
		echo "<div class='error'>$error</div>";
	
	?>

	<form method='post'>
		User Name: 
			<input name='author'>
		Thread Title: 
			<input name='title'>
		Thread Path: [<a href='#' title="This is the URL for your thread. Entering 'I love butts' here would create a new thread at bbs.wetfish.net/i-love-butts">?</a>]
			<input name='path'>
		Comment: 
			<textarea name='body'></textarea>
			
		<?php if(empty($_SESSION['bypassCaptcha'])) { echo recaptcha_get_html('6LdKvAoAAAAAAJL5OzO8-dIXE43MoCHQ-Tf7XFWI'); } ?>
		
		<input type='submit' value='SUBMIT, BITCHES!'>
	</form>

	<?php
}

$content['body'] = ob_get_contents();
ob_end_clean();

?>
