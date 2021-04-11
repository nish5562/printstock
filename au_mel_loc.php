<?php
include "connection.php";
//$eecaseno=$_GET['caseno'];

?>

<html lang="en">
<head>
  <title>HP Melbourne Stock location </title>
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

<div class="container">
  <h2>HP Melbourne Stock Location</h2>
  <form action="" name="form1" method="post" enctype="multipart/form-data">



	<div class="form-group">
      <label for="pwd">Select Stock Location (Melbounre):</label>
	  <select id="activeresource" name="activeresource">
	  <option><?php echo "Select Stock Location"; ?></option>
	  <option value="city">CITY</option>
	  <option value="hpq">HPQ</option>


	</select>
	</div>



	<button type="submit" name="update" class="btn btn-primary">Connect To Melbounre Location Stock</button>


  </form>
</div class="container">



</body>
<?php
if(isset($_POST["update"]))
{
    $tk=$_POST["activeresource"];
	if($tk=='city'){
        header("Location:index.php");
        exit();


    }
    $tk=$_POST["activeresource"];
	if($tk=='hpq'){
        header("Location:au_mel_loc_hpq.php");
        exit();


    }
}
?>


</html>
