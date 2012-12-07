<?php

$threadPath = preg_replace("{[^a-z0-9./-_()]+}i", "-", $threadPath);
$threadPath = sanitize($threadPath);
$threadTitle = sanitize($threadTitle);

$pathQuery = mysql_query("Select `id` from `Threads` where `path`='$threadPath'");
list($threadID) = mysql_fetch_array($pathQuery);

if(empty($threadID))
{
	mysql_query("Insert into `Threads` values ('', NOW(), '$threadPath', '$threadTitle')");
	$threadID = mysql_insert_id();
}

$threadAuthor = sanitize($threadAuthor);
$threadBody = sanitize($threadBody);
$userSession = session_id();
$userIP = $_SERVER['REMOTE_ADDR'];

mysql_query("Insert into `Comments` values ('', '$threadID', NOW(), '$threadAuthor', '$threadBody', '$userSession', '$userIP')");

$content['heading'] = "Comment successful!";
echo "You will now be redirected to your post...";
echo "<meta http-equiv='refresh' content='2;url=/$threadPath'>";

?>
