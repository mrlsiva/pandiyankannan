<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<title>Pandiyan Kannan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.menu-img {
    max-width:100px;
}
    </style>
</head>

<body>


    <main id="main">
                <?php
include('cpaneldetails/Dbconfig.php');
$query = "SELECT * FROM tbl_image ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
// $output .= ' <table class="table table-bordered table-striped">';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <div class="col-lg-6 menu-item"> Project Img<img  src="cpaneldetails/files/'.$row["image_name"].'" class="menu-img" alt=""> <div class="menu-content"> <a href="#">Project Name'.$row["ProductName"].'</a><span>Project Sub Name'.$row["price"].'</span> </div> <div class="menu-ingredients"> Project Desc'.$row["image_description"].' </div> </div>';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
// $output .= '</table>';
echo $output;
?>


</body>

</html>