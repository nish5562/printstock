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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

	::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1;
	}

	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #888;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #555;
	}


	</style>


</head>
<body>




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
        $query="SELECT * FROM hpq";
        $result=mysqli_query($link,$query);
        while($row=mysqli_fetch_array($result))
        {
            ?>
			<tr>

			<td><?php echo $row['part_no'] ?></td>
			<td><?php echo ($row['description']) ?></td>
			<td><?php echo ($row['room_no']) ?></td>
			<td><?php echo $row['stock_count'] ?></td>


      </tr>
			<?php

        }
        //mysqli_close();



	?>


</html>
