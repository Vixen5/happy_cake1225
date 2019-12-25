
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
<?php require_once('session_check.php'); ?>
<?php
//讀取product_category資料表的所有分類資料
$sql = 'SELECT * FROM order_details WHERE customer_orderID='. $_GET['orderID'];
$result = $db->query($sql);
$order_details = $result->fetchAll(PDO::FETCH_ASSOC);

$sql2 = 'SELECT * FROM customer_orders WHERE customer_orderID='. $_GET['orderID'];
$result2 = $db->query($sql2);
$customer_order = $result2->fetch(PDO::FETCH_ASSOC);

?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="../index.php">首頁</a>
                        </li>
                        <li><a href="customer_orders.php">我的訂單</a>
                        </li>
                        <li>訂單 # <?php echo $customer_order['order_no']; ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="basket.php"><i class="fa fa-shopping-cart"></i> 我的購物車</a>
                                </li>
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>                               
                                <li>
                                    <a href="../index.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>訂單 #<?php echo $customer_order['order_no']; ?></h1>

                        <p class="lead">訂單 #<?php echo $customer_order['order_no']; ?> 於 <strong><?php echo substr($customer_order['order_date'],0,10); ?></strong> 成立，目前狀態為
                        
                        <?php if($customer_order['status'] == 0){ ?>
                        <strong class="label label-info">待付款</strong>
                        <?php }elseif($customer_order['status'] == 1){ ?>
                        <strong class="label label-warning">備貨中</strong>
                        <?php }elseif($customer_order['status'] == 2){ ?>
                        <strong class="label label-warning">運送中</strong>
                        <?php }elseif($customer_order['status'] == 3){ ?>
                        <strong class="label label-success">交易完成</strong>
                        <?php }elseif($customer_order['status'] == 99){ ?>
                        <strong class="label label-danger">取消訂單</strong>
                        <?php } ?>.</p>
                        <p class="text-muted">有任何問題請 <a href="contact.php">聯絡我們</a>, 我們將盡快回覆您.</p>
                        <a class="btn btn-primary" href="customer-orders.php">回訂單列表</a>
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">產品名稱</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th>小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($order_details as $order_detail){ ?>
                                    <tr>
                                        <td>
                                                <img src="../uploads/products/<?php echo $order_detail['picture']; ?>" alt="White Blouse Armani">
                                        </td>
                                        <td><a href="products.php?productID=<?php echo $order_detail['productID']; ?>"><?php echo $order_detail['name']; ?></a>
                                        </td>
                                        <td><?php echo $order_detail['quantity']; ?></td>
                                        <td>$NT<?php echo $order_detail['price']; ?></td>
                                        <td><?php echo $order_detail['quantity'] * $order_detail['price']; ?></td>
                                    </tr>
                                <?php } ?>
                                   
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">訂單總計</th>
                                        <th>$NT<?php echo $customer_order['total'] - $customer_order['shipping']; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-right">運費</th>
                                        <th>$NT<?php echo $customer_order['shipping']; ?></th>
                                    </tr>
                                   
                                    <tr>
                                        <th colspan="4" class="text-right">合計</th>
                                        <th>$NT<?php echo $customer_order['total']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row">
                            <div class="col-md-12">
                                <h2>收件者資訊</h2>
                                <p>姓名：<?php echo $customer_order['name']; ?></p>
                                <p>行動電話：<?php echo $customer_order['phone']; ?></p>
                                <p>地址：<?php echo $customer_order['address']; ?></p>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>



</body>

</html>
