<?php
  require_once '../conn.php';
/*
echo "<pre>";
print_r($_POST);
echo "<pre>";
*/
  
	
	if(ISSET($_POST['edit'])){
		$PARAGRAPH_ID = $_POST['PARAGRAPH_ID'];
		$PARAGRAPH_No = $_POST['PARAGRAPH_No'];
    $PARAGRAPH_NAME = $_POST['PARAGRAPH_NAME'];
    $SECTION_ID = $_POST['SECTION_ID'];
		$sql = "UPDATE `doc_paragraph` SET `PARAGRAPH_No` = '$PARAGRAPH_No', `PARAGRAPH_NAME` = '$PARAGRAPH_NAME',  `SECTION_ID` = '$SECTION_ID'
     WHERE `PARAGRAPH_ID` = '$PARAGRAPH_ID'";
		//echo " sql = ".$sql;
		mysqli_query($conn,$sql ) or die(mysqli_error());
		
		//echo "<script>alert('Оновлено успішно!')</script>";
    echo "<script>window.location = '../view/paragraph.php'</script>";
  }
  	//echo "<script>alert('Данні НЕ Оновлені!')</script>";
?>