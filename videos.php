<?php
require_once('DbConnect.php');

$db = new DbConnect;
$conn = $db->connect();

?>






<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="utf-8">
<title>Video Lists</title>
</head>
<body>
<div class="w3-container">
  <h2>Video Uploaded List</h2>
  <!-- <p>Use any of the w3-<em>color</em> classes to display a colored row:</p> -->

  <table class="w3-table-all">
    <thead>
      <tr class="w3-red">
        <th>Sr No.</th>
        <th>Video Name</th>
        <th>Video URL</th>
      </tr>
      <?php 
      $i=0;
      $data = $conn->query("SELECT * FROM tbl_video")->fetchAll();
      foreach ($data as $row) {
			$id=$row['id'];
		$name = $row['name'];
    	//echo "name=".$row['name']." | URL=".$row['url'];
    	
      ?>
      <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $name;?></td>
      <td><?php echo "<a href='watch.php?id=$id'> $name <a> <br/>";?></td>
    </tr>
    <?php $i++;} ?>
    </thead>
    
  </table>
</div>
