<html>
<head>
<title>Пример коментариев</title>
<link rel="stylesheet" href="styles.css" type="text/css" />

</head>
<body>
<center>
<div style="max-width:570px;">
<div id="article">
<br/><br/>
<img class="main_jpg" style="width:90%" src="images/panda_main.jpg"><br/><br/>
</div>
	<?php
		date_default_timezone_set( 'Europe/Moscow' );
		include('comments.php');
	?>
</div>
</center>
<br/><br/><br/>
</body>
</html>