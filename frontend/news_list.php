<?php
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM news Order By published_at DESC");
$news = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <!-- *** LEFT COLUMN ***
		     _________________________________________________________ -->

                <div class="col-sm-9" id="blog-listing">

                    <ul class="breadcrumb">

                        <li><a href="#">首頁</a>
                        </li>
                        <li>最新消息</li>
                    </ul>
                    <?php foreach($news as $data){ ?>
                    <div class="post">
                        <h2><a href="news.php?newsID=<?php echo $data['newsID']; ?>"><?php echo $data['title']; ?></a></h2>
                       
                        <hr>
                        <p class="date-comments">
                            <a href="news.php?newsID=<?php echo $data['newsID']; ?>"><i class="fa fa-calendar-o"></i> <?php echo $data['published_at']; ?></a>
                           
                        </p>
                       
                        <p class="intro"><?php echo mb_strimwidth(strip_tags($data['content']), 0, 200, "..."); ?></p>
                        <p class="read-more"><a href="news.php?newsID=<?php echo $data['newsID']; ?>" class="btn btn-primary">了解更多</a>
                        </p>
                    </div>
                    <?php } ?>

                    
                   
                    <ul class="pagination">
                        <li class="page-item">
                       
                        <!-- 頁數超過1，上一頁可連結 -->
                        <a class="page-link" href="news_list.php">
                            <span>«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item">
                        <a class="page-link" href="news_list.php">1</a>
                        </li>
                       
                        <li class="page-item">
                      
                        <a class="page-link" href="news_list.php">
                            <span>»</span>
                            <span class="sr-only">Next</span>
                        </a>
                       
                        </li>
                    </ul>
     


                </div>
                <!-- /.col-md-9 -->

                <!-- *** LEFT COLUMN END *** -->


                <div class="col-md-3">
                    <!-- *** BLOG MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">最新優惠</h3>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** BLOG MENU END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="../images/ad-banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>






</body>

</html>