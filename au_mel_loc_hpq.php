<?php
include "au_mel_hpq_connection.php"
?>

<html lang="en">

<head>
  <title>HP Melbourne Print Stock v1.0</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">


</head>
<body>

<div class="container">
  <h3>HP Melbourne HPQ STOCK<h3>
  <br>
  <div>
  <form action="" name="form1" method="post">
  <div class="boxdiv">
     <label for="text">Full Stock List:</label>
	</div>
	<a href="au_mel_hpq_full_stock.php"><button type="button" class="btn btn-info">View Full Stock</button></a>
	<br>
<!--
  <div class="boxdiv">
  <br>
     <label for="text">Add New Part To The Stock:</label>
	</div>
	<a href="manualstock.php"><button type="button" class="btn btn-warning">Manual Input</button></a>
	<br>
-->


    <div class="boxdiv">
	<br>
      <label for="text">Search For The Part using PO-ID:</label>
	  <br>
      <input type="text" class="form-control" id="partid" placeholder="Enter the PO ID" name="partid">
	  <br>
	 </div>
	 <br>
	  <button type="submit" name="search" class="btn btn-primary">Search For Stock</button>



  </form>
</div class="container">


<table style="width:80%" class="table">
    <thead>
      <tr>

          <th>Part No</th>
          <th>Room No</th>
          <th>Description</th>
  		    <th>Stock Count</th>
      </tr>
    </thead>
    <tbody>

	<?php
		if(isset($_POST["search"]))
	{
		 $searchpo= $_POST["partid"];
		// $searchpo=preg_replace('/\s+/','',$a);
		 //$searchpo=var_dump($a);

		if(strlen($searchpo)>0)
	{
		$query = "SELECT * FROM hpq where part_no ='$searchpo'";
		$query_run = mysqli_query($link,$query);

		while($row = mysqli_fetch_array($query_run))

		{
			?>
			<tr>

			<td><?php echo $row['part_no'] ?></td>
			<td><?php echo ($row['room_no']) ?></td>
			<td><?php echo ($row['description']) ?></td>
			<td><?php echo $row['stock_count'] ?></td>
			<td> <a href="au_mel_loc_hpq_take_stock.php?partid=<?php echo $row["part_no"]; ?>"<button type="button" class="btn btn-success">Take Stock From HPQ</button> <?php</td>
      <td> <a href="au_mel_loc_hpq_add_stock.php?partid=<?php echo $row["part_no"]; ?>"<button type="button" class="btn btn-warning">ADD Stock To HPQ</button> <?php</td>
			</tr>
			<?php

		}
	}
	else{
		echo "NO part found with the give PO ID ";
		//echo strlen($searchpo);

	}

	}



	?>


</html>
