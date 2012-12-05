<?php

function parsePath($path)
{
	if(preg_match("/ /", $path))
	{
		$hyphenatedURI = str_replace(' ', '-', urldecode($_SERVER['REQUEST_URI']));
				
		header("Location: $hyphenatedURI");
		die();
	}
	
	return $path;
}

?>
