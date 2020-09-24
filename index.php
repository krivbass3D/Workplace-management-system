<?php 
session_start();
?>
<!DOCTYPE html>
<html lang = "ua">
	<head>
		<title>Система управління робочим місцем</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel = "stylesheet" type="text/css" href="css/style.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:orange;">
		<div class="container-fluid">
			<label class="navbar-brand" id="title">Система управління робочим місцем</label>
		</div>
	</nav>
	<?php include 'login.php'?>
	<div id = "footer">
		<label class = "footer-title">&copy; Система управління робочим місцем <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
</body>
</html>


