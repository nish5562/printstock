<?php
include "au_mel_hpq_connection.php";

?>
<html>
<body>
<div id="wrapper">
  <h1><b>Master Import Into HPQ</b></h1>
 <form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="file"/>
  <input type="submit" name="submit_file" value="Submit"/>
 </form>
</div>
</body>
<?php
if(isset($_POST["submit_file"]))
{
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open,1000,",")) !== FALSE)
 {
    $sqlinsert = "Insert into temp_import ( partTemp, roomTemp,  descriptionTemp, stockTemp) values ('".$csv[0]."','".$csv[1]."','".$csv[2]."','".$csv[3]."')";
    $res=mysqli_query($link, $sqlinsert);
 }
 $query = "UPDATE hpq
                   INNER JOIN
                   temp_import ON hpq.part_no = temp_import.partTemp
                   SET
                       stock_count = stock_count+stockTemp";



               $query2="INSERT INTO hpq ( part_no ,  room_no , description, stock_count)
               SELECT partTemp, roomTemp, descriptionTemp, stockTemp FROM temp_import
               WHERE temp_import.partTemp NOT IN (SELECT part_no FROM hpq)";

    $query3="DELETE FROM temp_import";

   mysqli_query($link,$query);
   mysqli_query($link,$query2);
   mysqli_query($link,$query3);
   echo "done";
}
?>
</html>
