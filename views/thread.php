<?php

// Don't load recaptcha unless we have to... *tinfoil*
if(empty($_SESSION['bypassCaptcha'])) { include('../shared/recaptchalib.php'); }

include_once('../models/thread.php');
$thread = \Thread\Model::fetch($path);

include_once('../models/comment.php');
$comments = \Comment\Model::fetch($thread['id']);


$content['title'] = "{$thread['title']} &mdash; " . $content['title'];
$content['heading'] = $thread['title'];

ob_start();

foreach($comments as $comment)
{
	echo "{$comment['time']} - {$comment['author']} - {$comment['body']}<br />";
}

echo "<hr />";

echo "<h2>Here's where you reply</h2>";

if($_POST)
{		
	include_once('../controllers/thread.php');
	$error = \Thread\Controller::comment($path, $_POST);
	
	if(empty($error))
	{	
		$content['heading'] = "Comment successful!";
		echo "You will now be redirected to your post...";
		echo "<meta http-equiv='refresh' content='2;url=/$path'>";
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
