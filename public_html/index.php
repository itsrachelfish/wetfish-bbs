<?php

include('../shared/actionParser.php');
include('../shared/pathParser.php');


// Hey guys, I'm the index and the router.
$actions = array('new');
$action = parseAction($actions);
$path = parsePath($_GET['path']);


// This array contains everything we've ever wanted to know about a page.
// It gets populated by views until ultimately being sent to a template.
$content = array('title' => 'Wetfish BBS');

switch($action[0])
{
	case "new":
		include('../views/new.php');
	break;
	
	default:
		if($path)
			include('../views/thread.php');
		else
			include('../views/home.php');
	break;
}

// This is where we call the template, still haven't entirely decided
// how we're going to handle switching between them.
include('../templates/basic.php');

?>
