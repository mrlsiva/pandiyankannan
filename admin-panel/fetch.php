<?php
include('Dbconfig.php');

// Ensure sort_order column exists and initialize values
$col_check = $connect->query("SHOW COLUMNS FROM tbl_image LIKE 'sort_order'")->fetchAll();
if(empty($col_check))
{
    $connect->exec("ALTER TABLE tbl_image ADD COLUMN sort_order INT DEFAULT 0");
    $rows = $connect->query("SELECT image_id FROM tbl_image ORDER BY image_id ASC")->fetchAll();
    $i = 1;
    foreach($rows as $row)
    {
        $connect->exec("UPDATE tbl_image SET sort_order = $i WHERE image_id = " . intval($row['image_id']));
        $i++;
    }
}

$query = "SELECT * FROM tbl_image ORDER BY sort_order ASC, image_id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table class="table table-bordered table-striped">
  <thead>
  <tr>
   <th width="40">Order</th>
   <th>Sr. No</th>
   <th>Project Image</th>
   <th>Project Name</th>
   <th>Link</th>
   <th>Description</th>
   <th>Edit</th>
   <th>Delete</th>
  </tr>
  </thead>
  <tbody id="sortable_body">
';
if($number_of_rows > 0)
{
    $count = 0;
    foreach($result as $row)
    {
        $count++;
        $output .= '
  <tr data-id="'.$row["image_id"].'">
   <td style="text-align:center; vertical-align:middle;">
    <span class="glyphicon glyphicon-move drag-handle" style="cursor:move; color:#aaa; font-size:16px;"></span>
   </td>
   <td>'.$count.'</td>
   <td><img src="files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td>'.$row["ProductName"].'</td>
   <td>'.$row["price"].'</td>
   <td>'.$row["image_description"].'</td>
   <td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row["image_id"].'">Edit</button></td>
   <td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row["image_id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
  </tr>
  ';
    }
}
else
{
    $output .= '
  <tr>
   <td colspan="8" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</tbody></table>';
echo $output;
?>
