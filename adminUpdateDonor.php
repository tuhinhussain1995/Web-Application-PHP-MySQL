<style type="text/css">

	*{margin:0;padding:0}
	body{font-family:Arial; font-size:16px; line-height:20px; color:#000000; padding-bottom: 200px}

	.fix{overflow:hidden}

	.maincontent{width:100%; background:url(images/white-waves.png)repeat fixed #ddd}

	.content{width:30%; text-align:left; float:right; margin-right:35%; border:7px solid #656D9E; border-radius:16px; margin-top:35px; margin-bottom:25px; padding:0px; background:url(images/vintage-concrete.png)repeat fixed #ddd}


	.content h2{font-size:27px; text-align:center; color:#385500; margin-top:15px}
	.content p{color:#B40610; margin:0% 10% 0% 10%; font-weight:bold; margin-bottom:5px}
	.content input{font-size:14px; border-radius:6px; height:23px}


	.inputSize{width:80%; margin:0% 10% 0% 10%}


	.submit input{padding:5px 20px 5px 20px; height:40px; float:right; margin-right:40%; width:20%; margin-bottom:16px; background:#2AA9E0; font-size:18px; font-weight:bold}

	button{padding:5px 20px 5px 20px; height:40px; float:right; margin-right:40%; width:20%; margin-bottom:16px; background:#2AA9E0; font-size:18px; font-weight:bold}
	

</style>




<?php

	include("connection.php");
	error_reporting(0);

	$_GET['fn'];
	$_GET['fa'];
	$_GET['mo'];
	$_GET['un'];
	$_GET['ps'];
	$_GET['ag'];
	$_GET['gn'];
	$_GET['pf'];
	$_GET['ed'];
	$_GET['pe'];
	$_GET['pr'];
	$_GET['ph'];
	$_GET['bg'];
	$_GET['sn'];
	$_GET['re'];
	$_GET['we'];
	$_GET['na'];
	$_GET['rd'];
	$_GET['as'];

?>



<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="fix maincontent">
		<div class="content">

			<form action="adminUpdateDonor.php" method="GET">

				<h2><strong>Blood Donor Update</strong></h2><br><hr><br>
							
				<p>Full Name:</p>
				<input type="text" name="full_name" class="inputSize" value="<?php echo $_GET['fn']; ?>"><br><br>

				<p>Father's Name:</p>
				<input type="text" name="father"  class="inputSize"value="<?php echo $_GET['fa']; ?>"><br><br>

				<p>Mother's Name:</p>
				<input type="text" name="mother" class="inputSize" value="<?php echo $_GET['mo']; ?>"><br><br>
				
				<p>Username:</p>
				<input type="text" name="user_name" class="inputSize" value="<?php echo $_GET['un']; ?>"><br><br>
				
				<p>Password:</p>
				<input type="text" name="password" class="inputSize" value="<?php echo $_GET['ps']; ?>"><br><br>
				
				<p>Age:</p>
				<input type="text" name="age" onkeypress="isInputNumber(event)" required maxlength="3" class="inputSize" value="<?php echo $_GET['ag']; ?>"><br><br>
				
				<p>Gender:</p><br>
				<input type="text" name="gender" class="inputSize" value="<?php echo $_GET['gn']; ?>"><br><br>
				
				<p>Profession:</p>
				<input type="text" name="profession" class="inputSize" value="<?php echo $_GET['pf']; ?>"><br><br>

				<p>Educational Background:</p>
				<input type="text" name="education" class="inputSize" value="<?php echo $_GET['ed']; ?>"><br><br>
				
				<p>Permanent Address:</p>
				<input type="text" name="perAddr" class="inputSize" value="<?php echo $_GET['pe']; ?>"><br><br>
				
				<p>Present Address:</p>
				<input type="text" name="preAddr" class="inputSize" value="<?php echo $_GET['pr']; ?>"><br><br>
				
				<p>Phone No:</p>
				<input type="text" name="phone_no" onkeypress="isInputNumber(event)" class="inputSize" required maxlength="14" value="<?php 
					$myString = $_GET['ph'];
					$myString[0] = '+';
					echo $myString; 
				?>"><br><br>
				
				<p>Blood Group:</p>
				<input type="text" name="blood_group" class="inputSize" value="<?php 
					if($_GET['sn'] == 'plus'){
						$currentString = $_GET['bg'];
						$currentStringLen = strlen($currentString);

						$currentString[$currentStringLen-1] = '+';

						echo $currentString;

					}
					else{
						echo $_GET['bg'];
					} 
				?>"><br><br>

				<p>Religion:</p>
				<input type="text" name="religion" class="inputSize" value="<?php echo $_GET['re']; ?>"><br><br>

				<p>Weight:</p>
				<input type="text" name="weight" onkeypress="isInputNumber(event)" required maxlength="3" class="inputSize" value="<?php echo $_GET['we']; ?>"><br><br>

				<p>Nationality:</p>
				<input type="text" name="nationality" class="inputSize" value="<?php echo $_GET['na']; ?>"><br><br>
				
				<p>Registration Date:</p>
				<input type="text" name="registration_date" class="inputSize" value="<?php echo $_GET['rd']; ?>"><br><br>

				<p>Account Status:</p>
				<input type="text" name="account_status" class="inputSize" value="<?php echo $_GET['as']; ?>"><br><br>
				
				
				<div class="submit">
					<input type="submit" name="submit" value="Update"><br><br>
				</div>

			</form>

			<a href="http://www.motivationgroupbd.org/adminHomeDonor.php"><button>Cancel</button></a>

		</div>
	</div>


<?php

	if($_GET['submit']){

		$fn = $_GET['full_name'];
		$fa = $_GET['father'];
		$mo = $_GET['mother'];
		$un = $_GET['user_name'];
		$ps = $_GET['password'];         
		$ag = $_GET['age'];
		$gn = $_GET['gender'];
		$pf = $_GET['profession'];
		$ed = $_GET['education'];
		$pe = $_GET['perAddr'];
		$pr = $_GET['preAddr'];
		$ph = $_GET['phone_no'];
		$bg = $_GET['blood_group'];
		$re = $_GET['religion'];
		$we = $_GET['weight'];
		$na = $_GET['nationality'];
		$rd = $_GET['registration_date'];
		$as = $_GET['account_status'];


		$queryId = "select id from blood_donor where user_name='$un'";
		$dataId = mysqli_query($conn, $queryId);
		$resultId = mysqli_fetch_assoc($dataId);

		$id = $resultId['id'];


		$query = "update blood_donor set full_name='$fn', father='$fa', mother='$mo', user_name='$un', password='$ps', age='$ag', gender='$gn', profession='$pf', education='$ed', permanent_address='$pe', present_address='$pr', phone_no='$ph', blood_group='$bg', religion='$re', weight='$we', nationality='$na', registration_date='$rd', account_status='$as' where id='$id'";

		$data = mysqli_query($conn, $query);


		if($data){
			echo "Update Successful...";

			?>
				<META HTTP-EQUIV="Refresh" CONTENT="1 URL=http://www.motivationgroupbd.org/adminHomeDonor.php">
			<?php

		}
		else{
			echo "<h1>Record not Updated. <a href='adminHomeDonor.php'>Check update list here</a></h1>";
		}

	}

?>


		<script>
			function isInputNumber(evt){
				var ch = String.fromCharCode(evt.which);

				if(!(/[0-9]/.test(ch))){
					evt.preventDefault();
				}
			}
		</script>

</body>
</html>

