<?php

namespace Thread;

class Controller
{
	function comment($threadPath, $post)
	{
		$threadAuthor = trim($post['author']);
		$threadBody = trim($post['body']);

		if(empty($threadBody))
			$error = "You should write something";
						
		if(empty($threadAuthor))
			$error = "You need a username :(";		
			
		if(empty($_SESSION['bypassCaptcha']))
		{
			if(preg_match("/^(fuck? you captcha?|fuck? captchas?|i hate captchas?|captchas?.*sucks?)$/i", $post["recaptcha_response_field"]))
				$_SESSION['bypassCaptcha'] = true;

			$privatekey = '6LdKvAoAAAAAAIez9hqwneKdoB6k6TFHKmMIwWUB';
			$resp = recaptcha_check_answer ($privatekey,
								$_SERVER["REMOTE_ADDR"],
								$post["recaptcha_challenge_field"],
								$post["recaptcha_response_field"]);

			if (!$resp->is_valid and !$_SESSION['bypassCaptcha'])
				$error = "You did the captcha wrong! Please try again.";
		}

		if(empty($error))
		{
			include_once('../models/thread.php');
			include_once('../models/comment.php');
			
			$threadID = \Thread\Model::update($threadPath);
			\Comment\Model::add($threadID, $threadAuthor, $threadBody);
		}
		
		return $error;
	}
}

?>
