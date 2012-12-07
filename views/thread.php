<?php

include('../models/thread.php');
$thread = \Thread\Model::fetch($path);

include('../models/comment.php');
$comments = \Comment\Model::fetch($thread['id']);


$content['title'] = "{$thread['title']} &mdash; " . $content['title'];
$content['heading'] = $thread['title'];

ob_start();

foreach($comments as $comment)
{
	echo "{$comment['time']} - {$comment['author']} - {$comment['body']}<br />";
}

echo "This is thread {$thread['id']}";

$content['body'] = ob_get_contents();
ob_end_clean();

?>
