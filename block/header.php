<?php 
	//require 'validator.php';
  require_once '../conn.php';
  
       echo "<pre>";
 echo($_SESSION['status']);
  echo "</pre>";
?>
<body>
	<nav class='navbar navbar-default navbar-fixed-top' style='background-color:orange'>
		<div class='container-fluid'>
			<label class='navbar-brand' id='title'>Система управління робочим місцем</label>
        <?php
          //$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user]'") or die(mysqli_error());
          //$fetch = mysqli_fetch_array($query);
        ?>
			<ul class = 'nav navbar-right'>	
				<li class = 'dropdown'>
					<a class = 'user dropdown-toggle' data-toggle = 'dropdown' href = '#'>
						<span class = 'glyphicon glyphicon-user'></span>
						<?php
              echo $fetch['username'];
            ?>
						<b class = 'caret'></b>
					</a>
				<ul class = 'dropdown-menu'>
					<li>
						<a href = '../logout.php'><i class = 'glyphicon glyphicon-log-out'></i> Вийти</a>
					</li>
				</ul>
				</li>
			</ul>
		</div>
	</nav>