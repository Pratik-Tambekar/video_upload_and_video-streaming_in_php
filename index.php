<?php
require_once('DbConnect.php');
require_once('videostreaming.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST['submit'])){

	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
    if(isset($name) && $name!=''){
	move_uploaded_file($temp, "uploaded/".$name);
	//http://localhost/video_upload/
	$url = "uploaded/".$name;
	$db = new DbConnect;
	$conn = $db->connect();
	$statement = $conn->prepare("INSERT INTO tbl_video(id, name, url) VALUES(:id, :name, :url)");
	$statement->execute(array(
	    "id" => null,
	    "name" => $name,
	    "url" => $url
		));
	}else
	{
		echo "<script type=text/javascript>alert('plz select video'); window.location=''</script>";
	}
}


}
?>






<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
   
   background-color: #cccccc;
}
	</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Upload Video</title>
</head>
<body>
	<div class="w3-container" style="width: 466px;margin: auto;margin-top: 153px;">
		
		<!-- <div class="w3-panel w3-blue w3-card-4 w3-border"> -->
			<div class="w3-card-4 w3-border w3-border-white">

			<header class="w3-container w3-blue" style="margin-top: 0px;width: 432px;">
			  <h1>Upload Video Panel</h1>
			</header>

		<div class="w3-container" style="width: 435px;height: 100px;">
			  	<p>
			  		<form action="index.php" method="POST" enctype="multipart/form-data">
					<span><input type="file" name="file" style="float: left;width: 240px;    margin-top: 19px;background-color: aqua;"/></span>
					<input class="w3-button w3-green" type="submit" name="submit" value="upload!" style="margin-top: 16px;float: right;" />
					</form>
				</p>
			</div>

			<footer class="w3-container w3-blue">
			  <h5 style="text-align: justify;">
			  	<?php

					if(isset($_POST['submit'])){

						echo "<br/>".$name." <b>has been uploaded</b>";
						
					}


					?>
					<br/>
					<a href="videos.php">See Video List</a> 
					
		</h5>
			</footer>
 
			</div>


    </div>
  </div>
</div>		

</div>

</body>
</html>