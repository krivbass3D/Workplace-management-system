<?php
  require_once '../conn.php';
  $array = $_POST;
 /*
echo "<pre>";
print_r($_POST);
echo "<pre>";
 */
	
	if(ISSET($_POST['update'])){
    
      $sql ="DELETE FROM zajava_structure WHERE POSADA_ID = ".$_POST['POSADA_ID'];
      //echo " sql = ".$sql;
      //echo "<br>";
      mysqli_query($conn,$sql);
      foreach($array as $key => $value)
  {
    if ($key!=='POSADA_ID' && !$value=="") {
      $sql ="INSERT INTO zajava_structure (POSADA_ID, STRUCTURE_NAME, PARAGRAPH_ID) VALUES (".$_POST['POSADA_ID'].", '".$value."', ".$key.")";
      
      //echo " sql = ".$sql;
      //echo "<br>";
      
      mysqli_query($conn,$sql);

      }
  }
		echo "<script>alert('Оновлено успішно!')</script>";
		echo "<script>window.location = '../view/posada.php'</script>";
  }
  	//echo "<script>alert('Данні НЕ Оновлені!')</script>";
?>