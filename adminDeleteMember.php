<?php

	include("connection.php");

	$id = $_GET['id'];

	$query = "delete from member where id='$id'";

	$data = mysqli_query($conn, $query);

	if($data){
		echo "<font color='green'>Record Deleted Successfully.";

		?>
			<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/adminHomeMember.php">
		<?php
	}
	else{
		echo "<font color='red'>Delete process failed";
	}

?>