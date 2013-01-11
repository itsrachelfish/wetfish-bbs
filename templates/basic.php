<html>
	<head>
		<title><?php echo $content['title']; ?></title>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js'></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/base/jquery-ui.css" type="text/css" />
		
		<link rel='stylesheet' href='/css/basic.css' type='text/css'>
		<script src='/js/basic.js'></script>
	</head>
	
	<body>
		<div class='right'><a href='/'>Recent Posts</a> | <a href='/?new'>New Thread</a></div>
		
		<h1><?php echo $content['heading']; ?></h1>

		<?php echo $content['body']; ?>
	</body>
</html>


<!-- amelia wuz heer -->
