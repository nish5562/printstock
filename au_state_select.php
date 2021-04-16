<?php
include "au_mel_hpq_connection.php";
//$eecaseno=$_GET['caseno'];

?>

<html lang="en">
<head>
  <title>HP Australia </title>
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
  <h2>Australia Print Stock Managment</h2>
  <form action="" name="form1" method="post" enctype="multipart/form-data">



	<div class="form-group">
      <label for="pwd">Please Select the State: </label>
	  <select id="activeresource" name="activeresource">
	  <option><?php echo "Select Sate:"; ?></option>
	  <option value="mel">MELBOURNE</option>
	  <option value="syd">SYDNEY</option>


	</select>
	</div>



	<button type="submit" name="update" class="btn btn-primary">Connect To State Stock</button>


  </form>
</div class="container">



</body>
<?php
if(isset($_POST["update"]))
{
    $tk=$_POST["activeresource"];
	if($tk=='mel'){
        header("Location:au_mel_loc.php");
        exit();


    }
    $tk=$_POST["activeresource"];
	if($tk=='syd'){
        header("Location:index.php");
        exit();


    }
}
?>


</html>
