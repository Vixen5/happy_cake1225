<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');
$sql= "SELECT * FROM products WHERE product_categoryID =:product_categoryID Order By created_at DESC";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":product_categoryID", $_GET['product_categoryID'], PDO::PARAM_STR);
  $sth ->execute();
//$query = $db->query("SELECT * FROM products WHERE product_categoryID=".$_GET['product_categoryID']." Order By created_at DESC");
$products = $sth->fetchAll(PDO::FETCH_ASSOC);

$total_Rows = count($products);
?>
<!DOCTYPE html>
<html>

<head>
 <?php include_once('../layouts/head.php'); ?>
</head>

<body>
<?php include_once('../layouts/nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-4">產品管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">產品管理</li>
          </ul>
        </div>
        <div class="col-md-12 utility" style="margin-bottom:20px;">    
         <a class="btn btn-info" href="../product_categories/list.php">回上一層</a>         
            <a class="btn btn-info" href="create.php?product_categoryID=<?php echo $_GET['product_categoryID']; ?>">新增一筆</a>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">圖片</th>
                <th scope="col">產品名稱</th>
                <th scope="col">價格</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php if($total_Rows > 0){ ?>
              <?php foreach($products as $data){ ?>
              <tr>   
                <td><img src="../../uploads/products/<?php echo $data['picture']; ?>" width="200" alt=""></td>       
                <td><?php echo $data['name']; ?></td>
               
                <td><?php echo $data['price']; ?></td>
                <td>
                  <a class="btn btn-info" href="update.php?product_categoryID=<?php echo $_GET['product_categoryID']; ?>&productID=<?php echo $data['productID']; ?>">編輯</a>
                  <a class="btn btn-info" href="delete.php?product_categoryID=<?php echo $_GET['product_categoryID']; ?>&productID=<?php echo $data['productID']; ?>" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};">刪除</a>
                </td>
              </tr>
              <?php } ?>
            <?php }else{ ?>
              <tr>
                <td colspan="3">目前無資料，請新增一筆</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
</body>

</html>