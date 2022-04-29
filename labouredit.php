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
                        <h2 class="page-title">edit labour information</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li>Edit labour Info</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
<?php	
$connect=mysqli_connect("localhost","root","","dlh_project");

			if(@$_GET){
				$l_type=$_GET["l_type"];
				$l_name=$_GET["l_name"];
				$gender=$_GET["gender"];
				$age=$_GET["age"];
				$email=$_GET["email"];
				$phone_no=$_GET["phone_no"];
				$address=$_GET["address"];
				$post_code=$_GET["post_code"];
				$l_image=$_GET["l_image"];
				$hourly_rate=$_GET["hourly_rate"];
			}
			if(@$_POST['edit']){
				$lid=$_POST["lid"];
				$l_type=$_POST["l_type"];
				$l_name=$_POST["l_name"];
				$gender=$_POST["gender"];
				$age=$_POST["age"];
				$email=$_POST["email"];
				$phone_no=$_POST["phone_no"];
				$address=$_POST["address"];
				$post_code=$_POST["post_code"];
				$l_image=$_FILES["l_image"]["name"];
				$hourly_rate=$_POST["hourly_rate"];
				if($l_type==null||$l_name==null||$gender==null||$age==null||$phone_no==null||$address==null||$post_code==null||$l_image==null||$hourly_rate==null){
					echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Some of The Fields Are Blank. Please Insert Data. <<<</center></b>";
				}else{
						if(@$_FILES['l_image']){
						//image upload
						$folder = "image/";
						
						if ((($_FILES["l_image"]["type"] == "image/gif")
						 || ($_FILES["l_image"]["type"] == "image/jpeg")
						 || ($_FILES["l_image"]["type"] == "image/jpg")
						 || ($_FILES["l_image"]["type"] == "image/pjpeg")
						 || ($_FILES["l_image"]["type"] == "image/x-png")
						 || ($_FILES["l_image"]["type"] == "image/png"))
						 && ($_FILES["l_image"]["size"] < 50000000)){
							move_uploaded_file($_FILES["l_image"]["tmp_name"] , "$folder".$_FILES["l_image"]["name"]);
							$query="update labour set l_type='$l_type',l_name='$l_name', gender='$gender', age='$age', email='$email', phone_no='$phone_no', address='$address', post_code='$post_code',
							l_image='image/$l_image', hourly_rate='$hourly_rate' where lid='$lid'";
							$result= mysqli_query($connect,$query);
							if(!$result){
								echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Error: </center>".mysqli_error($connect);
							}
							else{
								echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Data of Labour Is Edited! <<<</center></b>";
							}

						}else{
							echo "<b><center style='background-color:#ADD8E6; color:red'>>>> Something Wrong With Image Type or Size(5 MB). <<<</center></b>";
						}
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
                            <br> Hire Different Types 
                            <br> of Day Labour As You Need. 
                        </p>
                        <p>
                            <strong>Contact With Us</strong>
                            <br>
                            <a href="mailto:#">info@daylabourhire.com</a>
                        </p>
                    </div>
                    <!-- /.widget search -->
                    <div class="widget widget-social">
                        <div class="social-circle">
                            <a href="#" class="#"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="#"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>Labour Information Table</h1>
                            <p> Fill out the information below to add new labour. Must need to fill <span class="star-col">*</span> marked fields.</p>
                            <form method="post" action="labouredit.php" enctype="multipart/form-data">
                                <div class="row">
									<div class="col-md-6">
                                        <label class="control-label" for="l_type">labour type <span class="star-col">*</span></label>
                                        <select id="l_type" name="l_type" class="form-control" value="<?php echo (isset($l_type))?$l_type:'';?>"/>
                                            <option value="Select"> Select </option>
                                            <option value="Plumber"> Plumber </option>
											<option value="Electrician"> Electrician </option>
										</select>
                                    </div>
								
                                    <div class="col-md-6">
                                        <label class="control-label" for="l_name">name <span class="star-col">*</span></label>
                                        <input type="text" name="l_name" id="l_name" class="form-control"  value="<?php echo (isset($l_name))?$l_name:'';?>" required="" pattern="[A-Z][A-Za-z' -.]+" title="Only Letters, '-', White Space and ' Are Allowed"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="gender">gender <span class="star-col">*</span></label>
                                        <select id="gender" name="gender" class="form-control" value="<?php echo (isset($gender))?$gender:'';?>"/>
										    <option value="Select"> Select </option>	
                                            <option value="Male"> Male </option>
											<option value="Female"> Female </option>
										</select>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="age">Age <span class="star-col">*</span></label>
                                        <input type="text" name="age" id="age" class="form-control" value="<?php echo (isset($age))?$age:'';?>" required="" pattern="[0-9]{02}" title="Age Must Be 2 Digits, and Must Be Numeric (Fraction Not Allowed)"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="email">email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo (isset($email))?$email:'';?>" required="" title="Enter a Valid Mail"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="phone_no">phone no <span class="star-col">*</span></label>
                                        <input type="text" name="phone_no" id="phone_no" class="form-control" value="<?php echo (isset($phone_no))?$phone_no:'';?>" required="" pattern="[0-9]{10}" title="Phone No Must Be 10 Digits, and Must Be Numeric"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="address">address <span class="star-col">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" value="<?php echo (isset($address))?$address:'';?>" required=""/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="post_code">post code <span class="star-col">*</span></label>
                                        <input type="text" name="post_code" id="post_code" class="form-control" value="<?php echo (isset($post_code))?$post_code:'';?>" required="" pattern="[0-9]{6}" title="Post Code Must Be 6 Digits Numeric"/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="l_image">Image <span class="star-col">*</span></label>
                                        <input class="control-label" type="file" name="l_image" id="l_image" value="<?php echo 'image/$l_image';?>" required=""/>
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="hourly_rate">Electrician Rate <span class="star-col">*</span></label>
                                        <input type="text" name="hourly_rate" id="hourly_rate" class="form-control" value="<?php echo (isset($hourly_rate))?$hourly_rate:'';?>" required="" pattern="\d+(\.\d{2})?"  title="Input valid Price e.g. (500.00/500)"/>
                                    </div>
                                    <center><div class="col-md-12">
                                        <div class="form-group">
											<input type="hidden" value="<?php echo (isset($_GET["lid"]))? $lid:'';?>" name="lid"/>
                                            <input type="submit" name="edit" class="btn btn-default" value="Edit"/>
                                        </div>
                                    </div></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
</body></html>


<?php
}else {header("location: login.php");
		exit();
	}
}else {header("location: login.php");
	exit();
}
?>