<?php

$content['heading'] = "Welcome home friends";

ob_start();

echo "<img src='/img/wetfish-bbs.gif'><br />";

include('../models/thread.php');
$recentThreads = \Thread\Model::recent();

foreach($recentThreads as $thread)
{
	echo "{$thread['time']} &mdash; <a href='/{$thread['path']}'>{$thread['title']}</a><br />";
}

$content['body'] = ob_get_contents();
ob_end_clean();
