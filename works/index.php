<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" name="viewport">
<meta content="Madurai Maharaja Biriyani" name="apple-mobile-web-app-title">
<meta content="Madurai Maharaja Biriyani" name="application-name">
<meta content="#ff0000 " name="theme-color">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="MM Biriyani (also known as Madurai Maharaja Biriyani) is a restaurant chain that operates primarily in the Indian state of Tamil Nadu. The first outlet was opened in 2019 at Madurai. Since then, it operates over 2 outlets in TamilNadu. The MM Biriyani restaurants focus on biriyani. The founder, Alla Basha & Vel, started MM Biriyani restaurant by the name of Madurai Maharaja Biriyani in Madurai, Tamil Nadu." data-react-helmet="true" name="description">
<meta content="Madurai Maharaja Biriyani, Food delivery services" data-react-helmet="true" property="og:title">
<meta content="Madurai Maharaja Biriyani" data-react-helmet="true" property="og:site_name">
<meta content="maduraimaharajabiriyani.com" data-react-helmet="true" property="og:url">
<meta content="MM Biriyani (also known as Madurai Maharaja Biriyani) is a restaurant chain that operates primarily in the Indian state of Tamil Nadu. The first outlet was opened in 2019 at Madurai. Since then, it operates over 2 outlets in TamilNadu. The MM Biriyani restaurants focus on biriyani. The founder, Alla Basha & Vel, started MM Biriyani restaurant by the name of Madurai Maharaja Biriyani in Madurai, Tamil Nadu." data-react-helmet="true" property="og:description">
<meta content="https://www.facebook.com/mmbiryani1" data-react-helmet="true" property="article:author">
<meta content="https://www.maduraimaharajabiriyani.com/assets/img/Share.png?v1" data-react-helmet="true" property="og:image">
<meta content="image/jpeg" data-react-helmet="true" property="og:image:type">
<meta content="300" data-react-helmet="true" property="og:image:width">
<meta content="300" data-react-helmet="true" property="og:image:height">
<meta property="og:image" content="https://www.maduraimaharajabiriyani.com/assets/img/Share.png?v1">
<title>Madurai Maharaja Biriyani - Food delivery services</title>
<link rel='icon' href="https://www.maduraimaharajabiriyani.com/assets/img/favicon.png" type='image/x-icon' >

    <link href="https://www.maduraimaharajabiriyani.com/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css?v3" rel="stylesheet">
</head>

<body>


    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                        <div class="about-img">
                            <img src="assets/img/about.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>Madurai Maharaja Biriyani</h3>
                        <p class="font-italic">
                            MM Biriyani (also known as Madurai Maharaja Biriyani) is a restaurant chain that operates primarily in the Indian state of Tamil Nadu. The first outlet was opened in 2019 at Madurai. Since then, it operates over 2 outlets in TamilNadu. The MM Biriyani
                            restaurants focus on biriyani. The founder, Alla Basha & Vel, started MM Biriyani restaurant by the name of Madurai Maharaja Biriyani in Madurai, Tamil Nadu.
                        </p>
                       
                    </div>
                </div>

            </div>
        </section>
        



        <!-- End About Section -->

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