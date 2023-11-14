<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<title>Pandiyan Kannan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
<style>
    body {
        background: #222;
        font-family: 'Archivo Black', sans-serif;
    }
.menu-img {
    max-width:500px;
    margin: 0 auto;
    width:100%
}
.menu-item {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    padding: 12px;
    margin-bottom: 12px;
}
.title {
    width:100%;
    text-align: center
}
h2 {
    font-size: 24px;
    color: #fff;
}
    </style>
</head>

<body>
<div class="title">
    <h2> MY Works </h2>
</div>

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
  <div class="menu-item"> Project Img<img  src="cpaneldetails/files/'.$row["image_name"].'" class="menu-img" alt=""><br> <div class="menu-content"> <span href="#">Project Name :'.$row["ProductName"].'</span><br><a>Link :'.$row["price"].'</a> </div><br> <div class="menu-ingredients"> Project Desc :'.$row["image_description"].' </div> </div>';
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