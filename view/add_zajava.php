<?php
  require_once '../conn.php';
  $array = $_POST;
/*
  echo "<pre>";
print_r($array);
  echo "<pre>";
*/
  foreach($array as $key => $value)
  {
    if ($key!=='POSADA_ID' && !$value=="") {
      $sql ="INSERT INTO zajava_structure (POSADA_ID, STRUCTURE_NAME, PARAGRAPH_ID) VALUES (".$_POST['POSADA_ID'].", '".$value."', ".$key.")";
      //echo " sql = ".$sql;
      //echo "<br>";
      mysqli_query($conn,$sql);
      }
  }
  //echo "<script>alert('Додано успішно!')</script>";
  echo "<script>window.location = 'posada.php'</script>";
?>