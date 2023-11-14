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
    .img {
        width:100%;
        text-align: center;
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
<div class="title">
    <h2> MY Works </h2>
</div>
<h1>Responsive Image Gallery</h1><hr>
<div id="gallery" class="container-fluid">  
  <img src="https://source.unsplash.com/1600x1200?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/1024x768?female,portrait" class="img-responsive">
   <img src="https://source.unsplash.com/1366x768?female,portrait" class="img-responsive">
  <video class="vid" controls>
    <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
    </source>
  </video>
  <img src="https://source.unsplash.com/1920x1080?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/640x360?female,portrait" class="img-responsive">
<img src="https://source.unsplash.com/320x640?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/1200x1600?female,portrait" class="card img-responsive">
  <img src="https://source.unsplash.com/800x600?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/600x800?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/400x600?female,portrait" class="img-responsive">
  <img src="https://source.unsplash.com/600x400?female,portrait" class="img-responsive">
<img src="https://source.unsplash.com/1100x1600?female,portrait" class="img-responsive">
<img src="https://source.unsplash.com/1600x1100?female,portrait" class="img-responsive">
<img src="https://source.unsplash.com/992x768?female,portrait" class="img-responsive">
<img src="https://source.unsplash.com/768x992?female,portrait" class="img-responsive">

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
        <div class="menu-item"> <div class="img"><img  src="cpaneldetails/files/'.$row["image_name"].'" class="menu-img" alt=""></div><br> <div class="menu-content"> <span href="#">Project Name :'.$row["ProductName"].'</span><br><a>Link :'.$row["price"].'</a> </div> <div class="menu-ingredients"> Project Desc :'.$row["image_description"].' </div> </div>';
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