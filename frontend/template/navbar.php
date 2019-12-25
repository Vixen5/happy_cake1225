<?php
session_start();
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM product_categories Order By product_categoryID ASC");
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- *** TOPBAR ***
_________________________________________________________ -->
   <div id="top">
       <div class="container">
           <div class="col-md-6 offer" data-animate="fadeInDown">
               <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">前往加入會員</a>  <a href="#">立即取得200元購物金!</a>
           </div>
           <div class="col-md-6" data-animate="fadeInDown">
               <ul class="menu">
               <?php if(isset($_SESSION['member']) && $_SESSION['member'] !=null) { ?>
                    <li style="color:#fff;"><?php echo $_SESSION['member']['name']; ?> 您好　<a href="customer-account.php" >會員專區</a>
                   </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a>
                    </li>
               <?php }else{ ?>
                   <li><a href="#" data-toggle="modal" data-target="#login-modal">會員登入</a>
                   </li>
                   <li><a href="register.php?url=add">加入會員</a>
                   </li>
               <?php } ?>
                   <li><a href="contact.php">聯絡我們</a>
                   </li>
               </ul>
           </div>
       </div>
       <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
           <div class="modal-dialog modal-sm">

              <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title" id="Login">會員登入</h4>
                   </div>
                   <div class="modal-body">
                       <form action="check_member.php" method="post">
                           <div class="form-group">
                               <input type="text" class="form-control" id="email-modal" placeholder="account" name="account">
                           </div>
                           <div class="form-group">
                               <input type="password" class="form-control" id="password-modal" placeholder="password" name="password">
                           </div>

                           <p class="text-center">
                               <button class="btn btn-primary"><i class="fa fa-sign-in"></i> 登入</button>
                           </p>

                       </form>

                       <p class="text-center text-muted">尚未註冊會員?</p>
                       <p class="text-center text-muted"><a href="register.php"><strong>立即註冊</strong></a>! 1分鐘立即註冊即可領取百元購物金 !</p>

                   </div>
               </div>
           </div>
       </div>

   </div>

   <!-- *** TOP BAR END *** -->

   <!-- *** NAVBAR ***
_________________________________________________________ -->

   <div class="navbar navbar-default yamm" role="navigation" id="navbar">
       <div class="container">
           <div class="navbar-header">

               <a class="navbar-brand home" href="../index.php" data-animate-hover="bounce">
                   <img src="../images/logo.png" alt="Cake House logo" class="hidden-xs">
                   <img src="../images/logo-small.png" alt="Cake House logo" class="visible-xs"><span class="sr-only">Cake House - go to homepage</span>
               </a>
               <div class="navbar-buttons">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                       <span class="sr-only">Toggle navigation</span>
                       <i class="fa fa-align-justify"></i>
                   </button>
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle search</span>
                       <i class="fa fa-search"></i>
                   </button>
                   <a class="btn btn-default navbar-toggle" href="basket.php">
                       <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">
                       (<?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?>)</span>
                   </a>
               </div>
           </div>
           <!--/.navbar-header -->

           <div class="navbar-collapse collapse" id="navigation">

               <ul class="nav navbar-nav navbar-left">
                   <li><a href="../index.php">首頁</a>
                   </li>
                   <li ><a href="about.php">關於我們</a>
                   </li>
                   <li ><a href="news_list.php">最新消息</a>
                   </li>
                   <li class="dropdown yamm-fw">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">產品介紹 <b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li>
                               <div class="yamm-content">
                                   <div class="row">
                                       <div class="col-sm-12">
                                    <?php foreach($categories as $product_categories){  ?>
                                    <a href="product_list.php?category_id=<?php echo $product_categories['product_categoryID']; ?>">
                                    <h5><?php echo $product_categories['category']; ?></h5></a>
                                    <?php } ?>    
                                       </div>                                       
                                   </div>
                               </div>
                               <!-- /.yamm-content -->
                           </li>
                       </ul>
                   </li>
                   <li ><a href="contact.php">聯絡我們</a>
                   </li>
                                    
               </ul>

           </div>
           <!--/.nav-collapse -->

           <div class="navbar-buttons">

               <div class="navbar-collapse collapse right" id="basket-overview">
                   <a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">(<?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?>)</span></a>
               </div>
               <!--/.nav-collapse -->

               <div class="navbar-collapse collapse right" id="search-not-mobile">
                   <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle search</span>
                       <i class="fa fa-search"></i>
                   </button>
               </div>

           </div>

           <div class="collapse clearfix" id="search">

               <form class="navbar-form" role="search" action="search_result.php" method="get">
                   <div class="input-group">
                       <input type="text" class="form-control" placeholder="Search" name="keyword">
                       <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                   </div>
               </form>

           </div>
           <!--/.nav-collapse -->

       </div>
       <!-- /.container -->
   </div>
   <!-- /#navbar -->

   <!-- *** NAVBAR END *** -->
