<?php

namespace Thread;

class Model
{
	function create($path, $title)
	{
		$path = preg_replace("{[^a-z0-9./-_()]+}i", "-", $path);
		$path = sanitize($path);
		$title = sanitize($title);

		$pathQuery = mysql_query("Select `id` from `Threads` where `path`='$path'");
		list($threadID) = mysql_fetch_array($pathQuery);

		if(empty($threadID))
		{
			mysql_query("Insert into `Threads` values ('', NOW(), '$path', '$title')");
			$threadID = mysql_insert_id();
		}
		
		return $threadID;
	}
}


?>
