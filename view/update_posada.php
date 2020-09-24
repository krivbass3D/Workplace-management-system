<?php
  require_once '../conn.php';

  
	
	if(ISSET($_POST['edit'])){
		$POSADA_ID = $_POST['POSADA_ID'];
		$POSADA_NAME = $_POST['POSADA_NAME'];
		$POSADA_PIDROZDIL = $_POST['POSADA_PIDROZDIL'];
		$POSADA_MESTO = $_POST['POSADA_MESTO'];
		$sql = "UPDATE `posada` SET `POSADA_ID` = '$POSADA_ID', `POSADA_NAME` = '$POSADA_NAME', `POSADA_PIDROZDIL` = '$POSADA_PIDROZDIL', `POSADA_MESTO` = '$POSADA_MESTO' WHERE `POSADA_ID` = '$POSADA_ID'";
		//echo " sql = ".$sql;
		mysqli_query($conn,$sql ) or die(mysqli_error());
		
		echo "<script>alert('Оновлено успішно!')</script>";
		echo "<script>window.location = '../view/posada.php'</script>";
  }
  	//echo "<script>alert('Данні НЕ Оновлені!')</script>";
?>