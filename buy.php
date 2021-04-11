<?php
include "au_mel_hpq_connection.php";
$eecaseno=$_GET['partid'];
  $epart_no="";
	$eroom_no="";
	$edescription="";
	$estock_count="";
  $res=mysqli_query($link,"select * from hpq where part_no='$eecaseno'");
while($row=mysqli_fetch_array($res))
{
	$ewo=$row["part_no"];
	$eserviceAccount=$row["room_no"];
	$ecreatedOn=$row["stock_count"];
}

?>

<html lang="en">

<head>
  <title>Take Stock ACC PO-ID</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">


</head>
<body>
  <div class="container">
    <h3>Take Stock Acc PO-ID<h3>
    <br>
    <div>
    <form action="" name="form1" method="post">
      <div class="form-group">
         <label for="email">Part No:</label>
          <?php echo $ewo; ?>
       </div>
       <div class="form-group">
          <label for="email">Room No:</label>
           <?php echo $eserviceAccount; ?>
        </div>
        <div class="form-group">
           <label for="email">Stock Count:</label>
            <?php echo $ecreatedOn; ?>
         </div>
         <div class="boxdiv">
         	<label for="email"> quantity needed </label>
         	<input type="number" class="form-control" id="need" placeholder="Enter needed q" name="need">
         	</div>
        ****  eng nmae
        ****  woo adds



	 <br>
	  <button type="submit" name="search" class="btn btn-primary">Get The Stock</button>



  </form>
</div class="container">
<?php
  if(isset($_POST["search"]))
{
   $searchpo= (int)$ecreatedOn;
   //echo $searchpo;
   //echo $ewo;
  // $searchpo=preg_replace('/\s+/','',$a);
   //$searchpo=var_dump($a);
$tk=(int)$_POST["need"];
  if($searchpo>0)
{
  if($tk<=$searchpo)
  {
    $new_value=$searchpo-$tk;
  //  echo $searchpo;
    //echo $tk;
    echo $new_value;
    echo $ewo;

    $query="UPDATE hpq
        SET
    stock_count = $new_value
        WHERE
    part_no ='$ewo'";
mysqli_query($link,$query);
echo '<script>alert("Part has been taken from stock")</script>';

}
else{
  echo"that much quantity not available";
}
}
else{
  echo "NO part found with the give PO ID ";
  //echo strlen($searchpo);

}

}



?>

</html>
