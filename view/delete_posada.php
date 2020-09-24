<?php
	require_once '../conn.php';

  if(ISSET($_POST['POSADA_ID'])){
      $sql = "DELETE FROM `posada` WHERE `POSADA_ID` = '$_POST[POSADA_ID]'";
  		mysqli_query($conn, $sql) or die(mysqli_error());
	}
?>