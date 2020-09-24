<?php 

//кол-во записей в таблице
function countrecords($table){
  include("../conn.php");
  
  $sql="SELECT * FROM $table ";
  if ($result=mysqli_query($conn,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	mysqli_close($conn);
}

//кол-во записей в таблице с условием имяПоля=Значение
function countRecordsWhere($table,$fieldName,$value){
  include("../conn.php");
  
  $sql="SELECT * FROM $table WHERE ".$fieldName." = ".$value;
  //echo " sql = ".$sql;
  if ($result=mysqli_query($conn,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	mysqli_close($conn);
}

function rentcollected($table){
	//include("conn.php");
	$sql="SELECT SUM(paid_amount) AS totalpaid FROM $table ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		foreach ($result as $sumkey => $sumvalue) {
			# code...
			echo ''.$sumvalue['totalpaid'].'';
		}	
	}
	mysqli_close($con);
}
function getbalances($table){
	//include("conn.php");
	$sql="SELECT SUM(balance) AS allbalances FROM $table ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		foreach ($result as $balancekey => $balancevalue) {
			# code...
			echo ''.$balancevalue['allbalances'].'';
		}
	}
	mysqli_close($con);
}
function havingbalance($table){
	//include("conn.php");
	$sql="SELECT * FROM $table WHERE balance>0 ORDER BY id";
	if ($result=mysqli_query($con,$sql)) {
		# code...
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	mysqli_close($con);
}
function vacansCount($table){
//include("conn.php");
$sql="SELECT * FROM $table WHERE status='vaccant' ORDER BY id";
if ($result=mysqli_query($con,$sql)) {
	# code...
	$rowcount=mysqli_num_rows($result);
	echo $rowcount;
}
mysqli_close($con);
}

 ?>