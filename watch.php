<?php
require_once('DbConnect.php');
require_once('videostreaming.php');

$db = new DbConnect;
$conn = $db->connect();
$user=array();

?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Watch Video</title>
</head>
<body>

<?php

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$user = $conn->query("SELECT * FROM tbl_video where id='$id'")->fetch();
	$url = $user['url'];
	$vd = new VideoStream($url);
	$vd->start();
    //echo "you are watching ".$user['name']."<br/>";
    //echo  '';
   // echo "<embed src='$url' width='560' height='315'></embed>";
    



?>

<!-- <video width="320" height="240" autoplay controls>
    <source src="<?php echo $url?>" type="video/mp4">
    <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
        <param name="flashvars" value='config={"clip": {"url": "<?php echo $url?>", "autoPlay":true, "autoBuffering":true}}' /> 
        <p><a href="<?php echo $url?>">view with external app</a></p> 
    </object>
</video> -->
<?php 
}else
{

	die('Error!!');
	exit();
}

?>
</body>
</html>