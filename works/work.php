<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <title>Pandiyan Kannan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/fav.png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <style>
       h1{
  font-family: Satisfy;
  font-size:50px;
  text-align:center;
  color:black;
  padding:1%;
}
#gallery{
  -webkit-column-count:4;
  -moz-column-count:4;
  column-count:4;
  
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
@media (max-width:1200px){
  #gallery{
  -webkit-column-count:3;
  -moz-column-count:3;
  column-count:3;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:800px){
  #gallery{
  -webkit-column-count:2;
  -moz-column-count:2;
  column-count:2;
    
  -webkit-column-gap:20px;
  -moz-column-gap:20px;
  column-gap:20px;
}
}
@media (max-width:600px){
  #gallery{
  -webkit-column-count:1;
  -moz-column-count:1;
  column-count:1;
}  
}
#gallery img,#gallery video {
  width:100%;
  height:auto;
  margin: 4% auto;
  box-shadow:-3px 5px 15px #000;
  cursor: pointer;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}
.modal-img,.model-vid{
  width:100%;
  height:auto;
}
.modal-body{
  padding:0px;
}
    </style>
</head>

<body>
    <h1>Responsive Projects</h1><hr>
    <div id="gallery" class="container-fluid">  
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
                <img  src="cpaneldetails/files/'.$row["image_name"].'" class="menu-img" alt="">';
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
      <!-- <img src="https://source.unsplash.com/1600x1200?female,portrait" class="img-responsive">
      <img src="https://source.unsplash.com/1024x768?female,portrait" class="img-responsive"> -->
    </div>
    
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-body">
          </div>
        </div>
    
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
  $("img").click(function(){
  var t = $(this).attr("src");
  $(".modal-body").html("<img src='"+t+"' class='modal-img'>");
  $("#myModal").modal();
});

$("video").click(function(){
  var v = $("video > source");
  var t = v.attr("src");
  $(".modal-body").html("<video class='model-vid' controls><source src='"+t+"' type='video/mp4'></source></video>");
  $("#myModal").modal();  
});
});//EOF Document.ready
    </script>
</body>

</html>