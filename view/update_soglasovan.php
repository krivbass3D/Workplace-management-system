<?php
  require_once '../conn.php';
  $array = $_POST;
 /*
echo "<pre>";
print_r($array);
echo "<pre>";
*/

	
	if(ISSET($_POST['update'])){
    
      foreach($array as $key => $value)
      {

        

        if ($key!=='update') {
          $sql ="UPDATE `zajava_structure` SET `SOGLASOVANO` = '$value' WHERE `STRUCTURE_ID` = '$key'";
          
          //echo " sql = ".$sql;
          //echo "<br>";
          
          mysqli_query($conn,$sql);

          }
      }
		//echo "<script>alert('Оновлено успішно!')</script>";
		echo "<script>window.location = '../view/soglasovan.php'</script>";
  }
  	//echo "<script>alert('Данні НЕ Оновлені!')</script>";
?>