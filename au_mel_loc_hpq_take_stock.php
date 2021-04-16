<?php
include "au_mel_hpq_connection.php";
$eepartno=$_GET['partid'];
  $epart_no="";
	$eroom_no="";
	$edescription="";
	$estock_count="";
  $res=mysqli_query($link,"select * from hpq where part_no='$eepartno'");
while($row=mysqli_fetch_array($res))
{
	$epart_no=$row["part_no"];
	$eroom_no=$row["room_no"];
	$estock_count=$row["stock_count"];
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
    <h3><b>Take Stock According To PO-ID</b><h3>
    <br>
    <div>
    <form action="" name="form1" method="post">
      <div class="form-group">
         <label for="email">Part No:</label>
          <?php echo $epart_no; ?>
       </div>
       <div class="form-group">
          <label for="email">Room No:</label>
           <?php echo $eroom_no; ?>
        </div>
        <div class="form-group">
           <label for="email">Stock Count:</label>
            <?php echo $estock_count; ?>
         </div>
         <div class="boxdiv">
         	<label for="email"> quantity needed </label>
         	<input type="number" class="form-control" id="need" placeholder="Enter the Quantity" name="need">
         	</div>

          <div class="form-group">
      <label for="pwd">Engineer Name:</label>
	  <select id="activeresource" name="activeresource">
	  <option><?php echo "Select engineer name"; ?></option>
	  <option value="Nishant Sharma">Nishant Sharma</option>
	  <option value="Rahul Bajaj">Rahul Bajaj</option>
	  <option value="Usman Ali">Usman Ali</option>
	  <option value="Shimin Zhao">Shimin Zhao</option>
	  <option value="Jamie Fisher">Jamie Fisher</option>
	  <option value="Shahbaz Shaikh">Shahbaz Shaikh</option>
	  <option value="Nishad Siriwardena">Nishad Siriwardena</option>
	  <option value="Harsh Jaswal">Harsh Jaswal</option>
	</select>
	</div>
  <div class="boxdiv">
      <label for="email">Wo No:</label>
      <input type="text" class="form-control" id="wo" placeholder="Enter Wo No" name="wo">
    </div>




	 <br>
	  <button type="submit" name="search" class="btn btn-primary">Get The Stock</button>

<-- add add stock option back file -->


  </form>
</div class="container">
<?php
  if(isset($_POST["search"]))
{
   $searchpo= (int)$estock_count;
   $taken_from_stock='TAKEN';
   //echo $searchpo;
   //echo $epart_no;
  // $searchpo=preg_replace('/\s+/','',$a);
   //$searchpo=var_dump($a);
$tk=(int)$_POST["need"];
$ewo=$_POST["wo"];
$eeng=$_POST["activeresource"];
  if($searchpo>0)
{
  if($tk<=$searchpo)
  {
    $new_value=$searchpo-$tk;
  //  echo $searchpo;
    //echo $tk;
    echo $new_value;
    echo $epart_no;

    $query="UPDATE hpq
        SET
    stock_count = $new_value
        WHERE
    part_no ='$epart_no'";
mysqli_query($link,$query);
echo '<script>alert("Part has been taken from stock")</script>';
if(strlen($ewo)>0){
  // check with team for wo length
  mysqli_query($link,"insert into au_mel_all_out_history values(NULL,'$_POST[wo]','$_POST[activeresource]','$epart_no','$eroom_no','$estock_count','$_POST[need]','$taken_from_stock',CURRENT_TIMESTAMP)");
   echo "done";
}
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
