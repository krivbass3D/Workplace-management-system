<?php
  require_once '../conn.php';
/*
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
*/
	if(ISSET($_POST['save'])){
		$PARAGRAPH_NAME = $_POST['PARAGRAPH_NAME'];
		$PARAGRAPH_No = $_POST['PARAGRAPH_No'];
    $SECTION_ID = $_POST['SECTION_ID'];
    $sql = "INSERT INTO `doc_paragraph` (PARAGRAPH_NAME, PARAGRAPH_No, SECTION_ID) VALUES('$PARAGRAPH_NAME', '$PARAGRAPH_No', '$SECTION_ID')";
		//echo " sql = ".$sql;
		
		mysqli_query($conn,  $sql) or die(mysqli_error());
    echo "<script>window.location = '../view/paragraph.php'</script>";
	}
?>