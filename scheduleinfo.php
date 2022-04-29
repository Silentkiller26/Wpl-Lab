<?php
	include_once 'header.php';
	if(isset($_SESSION["login"])){
	if($_SESSION["usertype"]=="user"){
?>


<!DOCTYPE html>
<html lang="en">
<div class="page-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Schedule Information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="allalbour.php">labour</a></li>
                                <li>Labour Schedule</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
	th,td{
		text-align:center;
	}
	</style>
<body>
    
    
	
	<?php
	$connect=mysqli_connect("localhost","root","","dlh_project");

		
?>
	
<div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title mb40 text-center">
                        <h1><i>Labour Schedule Table</i></h1>
                    </div>
                </div>
            </div>
</div>



<?php
$query="select s.sno, l.lid, l.l_type, s.available_place, s.available_date, s.start_time, 
s.end_time from schedule s, labour l where status='' AND l.lid=s.lid ORDER BY sno DESC";
		$result= mysqli_query($connect,$query);
		echo "<center><table border='4' width='100%'>";
			echo "<tr class='control-label1'>";
				echo "<th width='12.5%'>Schedule no</th>";
				echo "<th width='12.5%'>LABOUR id</th>";
				echo "<th width='12.5%'>LABOUR Type</th>";
				echo "<th width='12.5%'>available place</th>";
				echo "<th width='12.5%'>available date</th>";
				echo "<th width='12.5%'>start time</th>";
				echo "<th width='12.5%'>end time</th>";
			echo "</tr>";
		if($result){
			while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$sno=$row["sno"];
				$lid=$row["lid"];
				$l_type=$row["l_type"];
				$available_place=$row["available_place"];
				$available_date=$row["available_date"];
				$start_time=$row["start_time"];
				$end_time=$row["end_time"];
				echo "<tr>";
					echo "<td>$sno</td>";
					echo "<td>$lid</td>";
					echo "<td>$l_type</td>";
					echo "<td>$available_place</td>";
					echo "<td>$available_date</td>";
					echo "<td>$start_time</td>";
					echo "<td>$end_time</td>";
				echo "</tr>";
			}
		}
		echo "</table></center>";
?>





			
	
	<div class="space-medium">
	</div>
</body></html>

<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>