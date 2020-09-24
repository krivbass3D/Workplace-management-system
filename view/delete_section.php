<?php
	require_once '../conn.php';

  if(ISSET($_POST['SECTION_ID'])){
      $sql = "DELETE FROM `zajava_section` WHERE `SECTION_ID` = ".$_POST['SECTION_ID'];
  		mysqli_query($conn, $sql) or die(mysqli_error());
	}
?>