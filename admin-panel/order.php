<?php
include('Dbconfig.php');

if(isset($_POST['order']))
{
    $order = $_POST['order'];
    $i = 1;
    foreach($order as $image_id)
    {
        $query = "UPDATE tbl_image SET sort_order = :sort_order WHERE image_id = :image_id";
        $statement = $connect->prepare($query);
        $statement->execute([':sort_order' => $i, ':image_id' => intval($image_id)]);
        $i++;
    }
    echo 'ok';
}
?>
