<?php
  require_once '../conn.php';
 /*
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
*/
	if(ISSET($_POST['save'])){
		$POSADA_NAME = $_POST['POSADA_NAME'];
		$POSADA_PIDROZDIL = $_POST['POSADA_PIDROZDIL'];
    $POSADA_MESTO = $_POST['POSADA_MESTO'];
    $sql = "INSERT INTO `posada` (POSADA_NAME, POSADA_PIDROZDIL, POSADA_MESTO) VALUES('$POSADA_NAME', '$POSADA_PIDROZDIL', '$POSADA_MESTO')";
		//echo " sql = ".$sql;
		
		mysqli_query($conn,  $sql) or die(mysqli_error());
		header('location: ../view/posada.php');
	}
?>