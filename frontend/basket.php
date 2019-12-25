
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
$is_updated = "false";
if(isset($_POST['quantity']) && $_POST['quantity'] != null){
    for($i = 0; $i < count($_SESSION['Cart']); $i++){
        $_SESSION['Cart'][$i]['quantity'] = $_POST['quantity'][$i];
    }
    $is_updated = "true";
}
?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>我的購物車</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="basket.php">

                            <h1>我的購物車</h1>
                            <?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){ ?>
                            <p class="text-muted">目前有 <?php echo count($_SESSION['Cart']); ?> 個未結帳商品</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>產品圖片</th>
                                            <th>產品名稱</th>
                                            <th>數量</th>
                                            <th>單價</th>
                                            <th colspan="2">金額</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $total_price = 0;
                                    for($i = 0; $i < count($_SESSION['Cart']); $i++){ ?>
                                        <tr>
                                            <td>

                                            <img src="../uploads/products/<?php echo $_SESSION['Cart'][$i]['pic']; ?>" alt="<?php echo $_SESSION['Cart'][$i]['product_name']; ?>">
                                               
                                            </td>
                                            <td><a href="#"><?php echo $_SESSION['Cart'][$i]['product_name']; ?></a>
                                            </td>
                                            <td>
                                                <input type="number" value="<?php echo $_SESSION['Cart'][$i]['quantity']; ?>" name="quantity[]" class="form-control">
                                            </td>
                                            <td>$NT <?php echo $_SESSION['Cart'][$i]['price']; ?></td>
                                            <td>$NT <?php $sub_total = $_SESSION['Cart'][$i]['quantity']* $_SESSION['Cart'][$i]['price']; echo $sub_total; ?> </td>
                                            <td><a href="cart/test_delete.php?index=<?php echo $i; ?>"><i class="fa fa-2x fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php 
                                        $total_price += $sub_total;
                                    } //End for 
                                    $_SESSION['order']['sub_total'] = $total_price;
                                    $_SESSION['order']['total_price'] = $total_price+150;
                                    ?>
                                                
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">總金額</th>
                                            <th colspan="2">$NT <?php echo $total_price; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                           
                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="product_list.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> 繼續購物</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> 更新購物車</button>
                                   <?php if(isset($_SESSION['member']) && $_SESSION['member'] != null){ ?>
                                    <a href="checkout1.php" class="btn btn-primary">我要結帳 <i class="fa fa-chevron-right"></i></a>
                                   <?php }else{ ?>
                                    <a href="register.php?url=basket" class="btn btn-primary">我要結帳 <i class="fa fa-chevron-right"></i></a>
                                   <?php } ?>
                                </div>
                            </div>
                            <?php }else { ?>                
                                <h4>目前購物車沒有商品，請至<a href="product_list.php">產品專區</a>進行購物。</h4>         
                            <?php } ?>
                        </form>
                            
                    </div>
                    <!-- /.box -->




                </div>
                <!-- /.col-md-9 -->
               
                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>訂單摘要</h3>
                        </div>
                        <p class="text-muted">購物滿2000免運費，只限台灣本島，離島需加上稅金與運費</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>商品總計</td>
                                        <th>$NT <?php echo $total_price; ?></th>
                                    </tr>
                                    <tr>
                                        <td>運費</td>
                                        <th>$NT 150</th>
                                    </tr>
                                   
                                    <tr class="total">
                                        <td>總金額</td>
                                        <th>$NT <?php echo $total_price+150; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                                

                </div>
                <!-- /.col-md-3 -->
                       
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

       <?php require_once('template/footer.php'); ?>
       
<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">訊息</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center text-muted">更新成功!</p>
                
            </div>
        </div>
    </div>
</div>   
<?php if($is_updated == "true"){ ?>   
<script>
        $(function(){
            $('#info-modal').modal();  
            // 2秒後視窗自動消失   
            setTimeout(function() {
                $('#info-modal').modal('hide');
            }, 2000);       
        });
</script> 
<?php 
   $is_updated = "false";
} ?>
<?php if(isset($_GET['Del']) &&  $_GET['Del'] == "true"){ ?>   
<script>
        $(function(){
            $('.modal-body>p').html("成功移除一個商品!");
            $('#info-modal').modal();  
            // 2秒後視窗自動消失   
            setTimeout(function() {
                $('#info-modal').modal('hide');
            }, 2000);       
        });
</script> 
<?php 
  
} ?>
</body>

</html>