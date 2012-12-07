<?php

function sanitize($data)
{
	if(get_magic_quotes_gpc())
		$data = stripslashes($data);
		
	return filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
}

?>
