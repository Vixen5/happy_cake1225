<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');
$query = $db->query("SELECT * FROM news Order By published_at DESC");
$news = $query->fetchAll(PDO::FETCH_ASSOC);
$total_Rows = count($news);
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
          <h1 class="mb-4">最新消息管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">最新消息管理</li>
          </ul>
        </div>
        <div class="col-md-12 utility" style="margin-bottom:20px;">         
            <a class="btn btn-info" href="create.php">新增一筆</a>          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">發佈日期</th>
                <th scope="col">圖片</th>
                <th scope="col">標題</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php if($total_Rows > 0){ ?>
              <?php foreach($news as $data){ ?>
              <tr>          
                <td><?php echo $data['published_at']; ?></td>
                <td><img src="../../uploads/news/<?php echo $data['picture']; ?>" width="200" alt=""></td>
                <td><?php echo $data['title']; ?></td>
                <td>
                  <a class="btn btn-info" href="update.php?newsID=<?php echo $data['newsID']; ?>">編輯</a>
                  <a class="btn btn-info" href="delete.php?newsID=<?php echo $data['newsID']; ?>" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};">刪除</a>
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