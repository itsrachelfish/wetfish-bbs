<?php

function parseAction($allowedActions)
{
	foreach($_GET as $action => $value)
	{
		$action = explode('/', strtolower($action));
			
		if(in_array($action[0], $allowedActions))
			return $action;
	}
}

?>
