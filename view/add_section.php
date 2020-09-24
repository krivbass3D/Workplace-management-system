<?php
  require_once '../conn.php';
/*
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
*/
	if(ISSET($_POST['save'])){
		$SECTION_NAME = $_POST['SECTION_NAME'];
		$SECTION_No = $_POST['SECTION_No'];
    $TIP_ZAJAVA_ID = $_POST['TIP_ZAJAVA_ID'];
    $sql = "INSERT INTO `zajava_section` (SECTION_NAME, SECTION_No, TIP_ZAJAVA_ID) VALUES('$SECTION_NAME', '$SECTION_No', 1)";
		//echo " sql = ".$sql;
		
		mysqli_query($conn,  $sql) or die(mysqli_error());
    echo "<script>window.location = '../view/section.php'</script>";
	}
?>