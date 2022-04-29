<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="admin"){
?>


<!DOCTYPE html>
<html lang="en">

    <div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Customer Information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">information</a></li>
                                <li>customer info</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
<?php
	$connect=mysqli_connect("localhost","root","","dlh_project");
	
	$usertype=$_SESSION['usertype'];
	
		if($_GET){
					if($_GET["event"]=="delete"){
					$phone_no=$_GET["phone_no"];
					$query="delete from user where phone_no=$phone_no";
					$result= mysqli_query($connect,$query);
				if(!$result){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: <<<</center></b>".mysql_error();
				}
				else{
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> User Data Deleted! <<<</center></b>";	
				}
			}
		}
?>
	
	

<div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title mb40 text-center">
                        <h1>Customer Information Table</h1>
                    </div>
                </div>
            </div>
</div>


<?php
$connect=mysqli_connect("localhost","root","","dlh_project");

$query="select phone_no, name, gender, occupation, address, post_code, email, Password from user where usertype='user'";
		$result= mysqli_query($connect,$query);
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='10%'>Phone no</th>";
				echo "<th width='10%'>name</th>";
				echo "<th width='10%'>gender</th>";
				echo "<th width='10%'>occupation</th>";
				echo "<th width='10%'>address</th>";
				echo "<th width='10%'>post code</th>";
				echo "<th width='10%'>email</th>";
				echo "<th width='10%'>Password</th>";
				echo "<th width='10%'>action</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$phone_no=$row["phone_no"];
				$name=$row["name"];
				$gender=$row["gender"];
				$occupation=$row["occupation"];
				$address=$row["address"];
				$post_code=$row["post_code"];
				$email=$row["email"];
				$Password=$row["Password"];
				echo "<tr>";
					echo "<td>$phone_no</td>";
					echo "<td>$name</td>";
					echo "<td>$gender</td>";
					echo "<td>$occupation</td>";
					echo "<td>$address</td>";
					echo "<td>$post_code</td>";
					echo "<td>$email</td>";
					echo "<td>$Password</td>";
					echo "<td><a href='userinformation.php?event=delete&phone_no=$phone_no'>Delete</a></td>";
				echo "</tr>";
			}
		}
		echo "</table></center>";
?>





			
	
	<div class="space-medium">
	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
</body></html>


<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>