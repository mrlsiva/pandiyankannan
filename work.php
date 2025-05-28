<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pandiyankannan | Personal Portfolio and Blog</title>
    <meta name="description" content="Welcome to Pandiyankannan's personal portfolio and blog. Explore my work, thoughts, and experiences in the world of technology and beyond.">
    <meta name="keywords" content="personal portfolio, blog, technology, software development, web development, coding, programming, Pandiyankannan">
    <link rel="icon" type="image/x-icon" href="assets/images/fav.png">
    <link rel="stylesheet" href="assets/css/style.css?v1">
    <link rel="stylesheet" href="assets/css/animation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body style="background-color: black;">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 header-row">
                    <a href="index.html" class="text-center">
                        <img src="assets/images/logo.svg" style="width: 250px;">
                    </a>
                </div>
                <div class="col-md-6 header-row text-right">
                    <h5 class="text-right">
                        <a href="contact.html" style="color: aliceblue;">GET IN TOUCH</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <main id="main">

    <!-- Dropdown for Category Filter -->
    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <select id="categoryFilter" class="form-control" style="display: none;">
                        <option value="all">All Categories</option>
                        <?php
                        include('admin-panel/Dbconfig.php');
                        $query = "SELECT DISTINCT ProductCategory FROM tbl_image ORDER BY ProductCategory";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $categories = $statement->fetchAll();
                        foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category['ProductCategory']) ?>">
                                <?= htmlspecialchars($category['ProductCategory']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <div id="productContainer">
        <?php
        $query = "SELECT * FROM tbl_image ORDER BY ProductCategory, image_id DESC";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row): ?>
            <section class="product-item" data-category="<?= htmlspecialchars($row['ProductCategory']) ?>">
                <div class="container pt-4">
                    <div class="row align-items-center">
                        <div class="col-md-12 text-center">
                            <h5 class="row-spinner slideInUp text-white">
                                <?= htmlspecialchars($row['ProductName']) ?>
                            </h5>
                        </div>
                        <div class="col-md-12">
                            <div class="menu-item"> 
                                <div class="img-cov col-md-12">
                                    <img src="admin-panel/files/<?= htmlspecialchars($row['image_name']) ?>" class="menu-img slideInUp" alt="<?= htmlspecialchars($row['ProductName']) ?>" loading="lazy">
                                </div>
                                <br>
                                <div class="menu-ingredients slideInUp text-white">
                                    <?= nl2br(htmlspecialchars($row['image_description'])) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                        <h5 class="row-spinner slideInUp">
                            <img class="star-img spinner" src="assets/images/asterisk-1.svg" alt="Extraordinary Spinner">
                        </h5>
                    </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <script>
        $('#categoryFilter').on('change', function () {
            var selectedCategory = $(this).val();
            if (selectedCategory === 'all') {
                $('.product-item').show();
            } else {
                $('.product-item').hide();
                $('.product-item[data-category="' + selectedCategory + '"]').show();
            }
        });
    </script>

    </main>

</body>

</html>
