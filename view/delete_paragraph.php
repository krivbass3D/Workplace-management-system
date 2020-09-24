<?php
	require_once '../conn.php';

  if(ISSET($_POST['PARAGRAPH_ID'])){
      $sql = "DELETE FROM `doc_paragraph` WHERE `PARAGRAPH_ID` = ".$_POST['PARAGRAPH_ID'];
  		mysqli_query($conn, $sql) or die(mysqli_error());
	}
?>