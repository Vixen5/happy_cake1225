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
    <?php 
    $query = $db->query("SELECT * FROM page WHERE pageID = 1");
    $about = $query->fetch(PDO::FETCH_ASSOC);

    ?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a></li>
                        <li><?php echo $about['title']; ?></li>
                    </ul>
                </div>


                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="box" id="text-page">
                            <h1><?php echo $about['title']; ?></h1>
                            <p class="lead"><?php echo $about['content']; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="" alt="">
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