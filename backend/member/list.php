<?php 
require_once('../../function/connection.php');
$query = $db->query("SELECT * FROM news Order By published_at DESC");
$news = $query->fetchAll(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> Home</a> </li>
            <li class="breadcrumb-item active">Link</li>
            <li class="breadcrumb-item active">Link</li>
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
                <th scope="col">標題</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($news as $data){ ?>
              <tr>          
                <td><?php echo $data['published_at']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td contenteditable="true" draggable="true">
                  <a class="btn btn-info" href="#">編輯</a>
                  <a class="btn btn-info" href="#">刪除</a>
                </td>
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