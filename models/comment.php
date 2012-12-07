<?php

namespace Comment;

class Model
{
	function add($threadID, $author, $body)
	{		
		$author = sanitize($author);
		$body = sanitize($body);
		$session = session_id();
		$ip = $_SERVER['REMOTE_ADDR'];

		mysql_query("Insert into `Comments` values ('', '$threadID', NOW(), '$author', '$body', '$session', '$ip')");
	}
	
	function fetch($threadID)
	{
		$threadID = sanitize($threadID);
		
		$commentQuery = mysql_query("Select * from `Comments` where `threadID`='$threadID'");
		while($comment = mysql_fetch_array($commentQuery))
		{
			$comments[] = $comment;
		}
		
		return $comments;	
	}
}

?>
