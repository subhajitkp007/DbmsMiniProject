<?php
    include_once 'mysql_connector.php';
	include_once 'upper.php';
	else if(isset($_POST['submit'])){
	$rb=mysqli_real_escape_string($conn,$_POST['rbvalue']);
	$ord_id="";
    $ord_id.= mysqli_real_escape_string($conn,$_POST['or_id']);
	$ord_id.=mysqli_real_escape_string($conn,$_POST['war_id']);
	$ord_id.=mysqli_real_escape_string($conn,$_POST['dt']);
	$sql="SELECT *from `shipment` where $rb='$ord_id';";
	$result= $conn->query($sql);
	if($result->num_rows<=0){
	echo "<h1>sorry order id ".$rb."=".$ord_id." does not exist</h1>";
	}
	else
	{
	 
	 $sql="DELETE FROM `shipment` where $rb='$ord_id'; ";
	  $result= $conn->query($sql);
	  if(mysqli_error($conn))
		  echo "error=".mysqli_error($conn);
	  else
	  echo "<h2> deleted Successfully</h2>";
	}
	}
	include_once 'footer.php';