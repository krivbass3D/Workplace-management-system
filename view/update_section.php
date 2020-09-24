<?php
  require_once '../conn.php';
 /*
echo "<pre>";
print_r($_POST);
echo "<pre>";
*/
  
	
	if(ISSET($_POST['edit'])){
		$SECTION_ID = $_POST['SECTION_ID'];
		$SECTION_No = $_POST['SECTION_No'];
    $SECTION_NAME = $_POST['SECTION_NAME'];
    $TIP_ZAJAVA_ID = $_POST['TIP_ZAJAVA_ID'];
		$sql = "UPDATE `zajava_section` SET `SECTION_ID` = '$SECTION_ID', `SECTION_No` = '$SECTION_No', `SECTION_NAME` = '$SECTION_NAME',  `TIP_ZAJAVA_ID` = '$TIP_ZAJAVA_ID' WHERE `SECTION_ID` = '$SECTION_ID'";
		//echo " sql = ".$sql;
		mysqli_query($conn,$sql ) or die(mysqli_error());
		
		echo "<script>alert('Оновлено успішно!')</script>";
    echo "<script>window.location = '../view/section.php'</script>";
  }
  	//echo "<script>alert('Данні НЕ Оновлені!')</script>";
?>