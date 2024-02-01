<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandiyankannan | Personal Portfolio and Blog</title>
    <meta name="description" content="Welcome to Pandiyankannan's personal portfolio and blog. Explore my work, thoughts, and experiences in the world of technology and beyond.">
    <meta name="keywords" content="personal portfolio, blog, technology, software development, web development, coding, programming, Pandiyankannan">
	<link rel="icon" type="image/x-icon" href="assests/images/fav.png">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/animation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .header-row {
            padding-top: 30px;
        }

        .project-tit h1 {
            padding-top: 150px;
        }

        .row-spinner {
            font-size: 40px;
        }
        .star-img {
            width:70px;
            margin: auto;

        }
        @media screen and (max-width:768px){ 
            .star-img {
            width:28px;
            margin: auto;

        }

        }
    </style>
</head>

<body style="background-color: black;">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 header-row">
                    <a href="index.html" class="text-center"><img src="assests/images/logo.svg"
                            style="width: 250px;"></a>
                </div>
                <div class="col-md-6 header-row">
                    <H5 class="text-right"><a href="contact.html" style="color: aliceblue;">GET IN TOUCH</a></H5>
                </div>
            </div>
        </div>
    </section>
    <main id="main">
                        <?php
                                include('admin-panel/Dbconfig.php');
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

    <section>
        <div class="container" style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 col-md-4">
                    <H5 class="text-left row-spinner slideInUp" style="color: aliceblue;">'.$row["ProductName"].'</H5>
                </div>
                <div class="col-4 col-md-4">
                    <H5 class="text-center row-spinner slideInUp">
                        <img class="star-img spinner star-img"
                            src="assests/images/asterisk-1.svg" alt="Extraordinary Spinner">
                        <span></span>
                    </H5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container" style="padding-top: 30px;">
            <div class="row">
                <div class="col-md-12">
                    
                                <div class="menu-item"> 
                                    <div class="img-cov col-md-12">
                                        <img  src="admin-panel/files/'.$row["image_name"].'" class="menu-img slideInUp" alt="" loading="lazy">
                                    </div>
                                    <br> 
                                    
                                    <div class="menu-ingredients slideInUp"> 
                                        '.$row["image_description"].'
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    </section>
    ';
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
    <style>
        .img-cov {

            text-align: center;
        }

        .menu-img {
            /* max-width: 600px; */
            margin: 0 auto;
            width: 100%
        }

        .menu-content span {
            color: white;
            font-size: 30px
        }

        .menu-ingredients {
            color: white;
            font-size: 30px;
            /* padding-bottom: 20px; */
        }
    </style>

</body>

</html>