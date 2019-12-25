<?php
require_once('../function/connection.php');
  $sql= "INSERT INTO members  (account, password, name, created_at) VALUES ( :account, :password, :name, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $result = $sth ->execute();

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

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>加入會員</li>
                        <li>註冊成功</li>
                    </ul>


                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="../images/logo.png" alt="Cake House template">
                                </p>
                              <?php if($result){ 
                                  if(isset($_POST['url']) && $_POST['url'] == "basket"){    
                              ?>         
                               <script>
                                   window.location = 'checkout1.php';
                               </script>                           
                                  <?php }else{ ?>
                                    <h3>註冊成功</h3>
                                    <h4 class="text-muted">恭喜您加入會員</h4>
                                    <p class="text-center">您可前往產品頁面瀏覽商品。<a href="product_list.php?category_id=1">前往購物</a></p>
                                    <p class="buttons"><a href="../index.php" class="btn btn-primary"><i class="fa fa-home"></i> 回首頁</a>
                                    </p>
                                  <?php } ?>
                              <?php }else{ ?>
                                <h3>註冊失敗</h3>
                                <h4 class="text-muted">請聯繫客服或前往註冊頁面重新註冊</h4>

                               
                                <p class="buttons"><a href="register.php" class="btn btn-primary"><i class="fa fa-home"></i> 回註冊頁面</a>
                                </p>
                              <?php } ?>
                            </div>
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