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
                        <h2 class="page-title">Other Labour Required</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="others_required.php">other</a></li>
                                <li>others need</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php
$connect=mysqli_connect("localhost","root","","dlh_project");

	if(@$_POST['singlebutton']){
				$labour_type=$_POST["labour_type"];
				$place=$_POST["place"];
				$quantity=$_POST["quantity"];
				$date=$_POST["date"];
				$time=$_POST["time"];
				$description=$_POST["description"];
				$phone_no=$_SESSION['phone_no'];
				if($labour_type==null||$place==null||$quantity==null||$date==null||$time==null||$description==null){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
				}else{
							$query="insert into others_required values('','$labour_type','$place','$quantity','$date','$time','$description','$phone_no')";
							$result=mysqli_query($connect,$query);
							if(!$result){
								echo mysqli_error($connect);
							}else {
								echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Your Data Is Inserted. We Will Contact With You Very Soon. <<<</center></b>";
							}
						}
					
				}
?>
	
	
	
<div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="widget widget-contact">
                        <h3 class="widget-title"><strong>attention</strong></h3>
                        <p>
                            <br> You Must Be Registered
                            <br> For Hire Labour.
                            <br> Register Yourself And 
                            <br> Log In To the System And 
                            <br> Hire Different Types 
                            <br> of Day Labour As You Need.
                        </p>
						<p>
                            <strong>Contact With Us</strong>
                            <br>
                            <a href="mailto:#">info@labourly.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>Need Other Skills</h1>
							 <p> Please fill out the information if you need other type labour/skills. We will contact with you soon.<span class="star-col">*</span> marked fields.</p>
                            <form name='others_required' action="others_required.php" method="post" enctype="multipart/form-data">
                                <div class="row">
									<div class="col-md-6">
                                        <label class="control-label" for="labour_type">labour Type <span class="star-col">*</span></label>
                                        <input type="text" name="labour_type" id="labour_type" placeholder="eg. - Cleaner" class="form-control" required=""/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="place">Place <span class="star-col">*</span></label>
                                        <input type="text" name="place" id="place" placeholder="eg. - Dhanmondi" class="form-control" required=""/>
                                    </div>
									<div class="col-md-12">
                                        <label class="control-label" for="quantity">Labour Quantity <span class="star-col">*</span></label>
                                        <input type="number" name="quantity" id="quantity" placeholder="eg. 5" class="form-control" required="" min="1" max="5"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="date">Date <span class="star-col">*</span></label>
                                        <input type="date" name="date" id="date" class="form-control" required=""/>
                                    </div>
									
									<script type="text/javascript">
										   var today = new Date().toISOString().split('T')[0];
												document.getElementsByName("date")[0].setAttribute('min', today);
									</script>
									
									
									<div class="col-md-6">
                                        <label class="control-label" for="place">Time <span class="star-col">*</span></label>
                                        <input type="time" name="time" id="time" class="form-control" required=""/>
                                    </div>
									<div class="col-md-12">
                                        <label class="control-label" for="description">Description <span class="star-col">*</span></label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Write a description about your need....... (Write Between 100 Words)" required=""/></textarea>
                                    </div>
									<center>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" id="singlebutton" name="singlebutton" class="btn btn-default" value="submit" />
										</div>
                                    </div>
									</center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="space-medium"></div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
</body></html>

<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>
