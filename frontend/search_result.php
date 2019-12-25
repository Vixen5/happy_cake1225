
<!DOCTYPE html>
<html lang="en">

<head>

   
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>
<?php
$query = $db->query("SELECT * FROM products WHERE name LIKE '%". $_GET['keyword']."%' OR description LIKE '%". $_GET['keyword']."%'");
$search_result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li><a href="#">Ladies</a>
                        </li>
                        <li><a href="#">Tops</a>
                        </li>
                        <li>White Blouse Armani</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">產品分類</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach($categories as $side_categories){  
                                    $query = $db->query("SELECT * FROM products WHERE product_categoryID=".$side_categories['product_categoryID']);
                                    $total_products = count($query->fetchAll(PDO::FETCH_ASSOC));
                                ?>
                                <li>
                                    <a href="product_list.php?category=<?php echo $side_categories['product_categoryID']; ?>"><?php echo $side_categories['category']; ?> <span class="badge pull-right"><?php echo $total_products; ?></span></a>
                                    
                                </li>
                            <?php } ?>

                            </ul>

                        </div>
                    </div>

                    
                    

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="../images/ad-banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="row">
                        <div class="col-sm-12">    
                        <h3 class="panel-title">搜尋結果</h3>    
                        <br>
                        <p>您所搜尋的關鍵字「<?php echo $_GET['keyword']; ?>」的結果如下:</p>
                        <?php foreach($search_result as $product){  ?>           
                        <div class="col-sm-3">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="product.php?id=<?php echo $product['products_id']; ?>">
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="product.php?id=<?php echo $product['products_id']; ?>">
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.php?id=<?php echo $product['products_id']; ?>" class="invisible">
                                    <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="product.php?id=<?php echo $product['products_id']; ?>"><?php echo $product['name']; ?></a></h3>
                                    <p class="price">$NT <?php echo $product['price']; ?></p>
                                </div>
                                <!-- /.text -->
                                <?php if($product['status']== 1){ ?>
                                    <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php }else if($product['status'] == 2){ ?>
                                <!-- /.ribbon -->
                                    <div class="ribbon sale">
                                        <div class="theribbon">SALE</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                <?php } ?>
                               
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>

                   
                        </div>
                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>





</body>

</html>