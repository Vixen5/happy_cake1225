<?php 
require_once('../is_login.php');
require('../../function/connection.php'); ?>
<?php 
$query = $db->query("SELECT * FROM customer_orders WHERE status=".$_GET['status']." ORDER BY order_date DESC");
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$total_rows = count($data);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> 
  
</head>

<body>
<?php include_once('../layouts/nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">訂單管理-
          <?php switch($_GET['status']){
                      case 0:
                        echo "新訂單";
                        break;
                      case 1:
                        echo "待出貨訂單";
                        break;
                      case 2:
                        echo "已收貨訂單";
                        break;
                      case 3:
                        echo "交易完成訂單";
                        break;
                      case 99:
                        echo "已取消訂單";
                        break;
                  }
            ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item active">訂單管理
            
            </li>
          </ul>
 
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 text-left my-2">
          <select class="form-control" id="status" name="status">
            <option value="0" <?php if($_GET['status'] == 0) echo "selected"; ?>>新訂單</option>
            <option value="1" <?php if($_GET['status'] == 1) echo "selected"; ?>>待出貨訂單</option>
            <option value="2" <?php if($_GET['status'] == 2) echo "selected"; ?>>已收貨訂單</option>
            <option value="3" <?php if($_GET['status'] == 3) echo "selected"; ?>>已完成訂單</option>
            <option value="99" <?php if($_GET['status'] == 99) echo "selected"; ?>>已取消訂單</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <?php if($total_rows > 0){ ?>
          <table class="table">
            <thead>
              <tr>
                <th width="15%">訂單編號</th>
                <th width="15%">訂購日期</th>
                <th width="10%">收件者</th>
                <th>行動電話</th>
                <th>收件地址</th>
                <th width="10%">訂單總金額</th>
                <th width="10%">目前狀態</th>
                <th width="20%">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $customer_orders){  ?>
              <tr>
                <td><?php echo $customer_orders['order_no']; ?></td>
                <td class="text-left"><?php echo $customer_orders['order_date']; ?></td>
                <td class="text-left"><?php echo $customer_orders['name']; ?></td>
                <td class="text-left"><?php echo $customer_orders['phone']; ?></td>
                <td class="text-left"><?php echo $customer_orders['address']; ?></td>
                <td class="text-left"><?php echo $customer_orders['total']; ?></td>
                <td class="text-left"><?php echo $customer_orders['status']; ?></td>
                <td>
                  <a href="../order_details/list.php?customer_orderID=<?php echo $customer_orders['customer_orderID']; ?>&status=<?php echo $_GET['status'];?>" class="btn btn-outline-primary">檢視訂單明細</a>
                  <a href="edit.php?customer_orderID=<?php echo $customer_orders['customer_orderID']; ?>" class="btn btn-outline-primary">編輯</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
              <?php }else{ ?>
              <p>目前無訂單</p>
              <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#">
                <span>«</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <span>»</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 MacroViz - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  $(function(){
    $('select[name="status"]').change(function(){
      console.log($('select[name="status"]').val());
      window.location = 'list.php?status='+ $('select[name="status"]').val();
     });
  });
  </script>
</body>

</html>