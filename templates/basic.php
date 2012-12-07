<html>
	<head>
		<title><?php echo $content['title']; ?></title>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js'></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/base/jquery-ui.css" type="text/css" />
		
		<style>
			body {
				background-color:#000;
				font-family:Courier New;
				font-size:10pt;
				color:#eee;
			}
			
			input, textarea {
				display: block;
				width:100%;
				margin-bottom:10px;
			}
			
			textarea {
				min-height:200px;
			}
			
			input[type='submit'] {
				border-radius:4px;
			}
			
			.error {
				background-color:rgba(255, 0, 0, 0.3);
				border:1px solid rgba(255, 0, 0, 0.5);
				margin-bottom:20px;
				padding:10px;
			}
			
			.right { float: right; }
			.left { float: left; }
		</style>
		
		<script>
			var RecaptchaOptions = {
				theme : 'blackglass'
			};
		</script>
	</head>
	
	<body>
		<div class='right'><a href='/'>Recent Posts</a> | <a href='/?new'>New Thread</a></div>
		
		<h1><?php echo $content['heading']; ?></h1>

		<?php echo $content['body']; ?>
	</body>
</html>
