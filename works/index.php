<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<title>Pandiyan Kannan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <main id="main">

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Check Our Tasty Menu</p>
                </div>
                <?php
                require('cpaneldetails/Dbconfig.php');
                ?> 
                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
               
                
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
  <div class="col-lg-6 menu-item"> <img src="cpaneldetails/files/'.$row["image_name"].'" class="menu-img" alt=""> <div class="menu-content"> <a href="#">'.$row["ProductName"].'</a><span>Rs.'.$row["price"].'</span> </div> <div class="menu-ingredients"> '.$row["image_description"].' </div> </div>';
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
                

                </div>

            </div>
        </section>
        <!-- End Menu Section -->


    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/common-contact-form/css/custom/style.css?v2">
    <script type="text/javascript" src="assets/common-contact-form/js/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="assets/common-contact-form/js/vendor/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/common-contact-form/js/custom/custom.js"></script>
</body>

</html>