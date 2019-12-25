<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "UPDATE"){
  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    $filename = $_FILES['picture']['name'];
    $file_path = "../../uploads/news/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
  }else{
    $filename = $_POST['old_picture'];
  }
  $sql= "UPDATE news SET picture=:picture, published_at=:published_at, title=:title, content=:content, updated_at=:updated_at WHERE newsID=:newsID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":published_at", $_POST['published_at'], PDO::PARAM_STR);
  $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":newsID", $_POST['newsID'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list.php');
}else{
  $query = $db->query("SELECT * FROM news WHERE newsID=".$_GET['newsID']);
  $one_news = $query->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>

<head>
  <?php include_once('../layouts/head.php'); ?>
  <link rel="stylesheet" href="../../js/jquery-ui/jquery-ui.min.css">
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
            <li class="breadcrumb-item active">編輯</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <form id="c_form-h" class="" method="post" action="update.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="picture" class="col-2 col-form-label">圖片</label>
              <div class="col-10 text-left">
              <img class="mb-2" src="../../uploads/news/<?php echo $one_news['picture']; ?>" width="200" alt="">
              <input type="hidden" name="old_picture" value="<?php echo $one_news['picture']; ?>">
                <input type="file" class="form-control-file" id="picture" name="picture"> </div>
            </div>
            <div class="form-group row"> <label for="published_at" class="col-2 col-form-label">發佈日期</label>
              <div class="col-10">
                <input type="text" class="form-control" id="published_at" name="published_at" value="<?php echo $one_news['published_at']; ?>"> </div>
            </div>
            <div class="form-group row">
              <label for="title" class="col-2 col-form-label">標題</label>
              <div class="col-10">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $one_news['title']; ?>"> </div>
            </div>
            <div class="form-group row">
              <label for="content" class="col-2 col-form-label">內容</label>
              <div class="col-10">
                <textarea class="form-control" id="content" name="content"><?php echo $one_news['content']; ?></textarea> </div>
            </div>
            <a class="btn btn-info" href="#">回上一頁</a>
            <button type="submit" class="btn btn-success">確認</button>
            <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="EditForm" value="UPDATE">
            <input type="hidden" name="newsID" value="<?php echo $_GET['newsID']; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
  <script>
   $(function(){
    $( "#published_at" ).datepicker({
         dateFormat: 'yy-mm-dd'
    });
   
   });
   tinymce.init({
      selector: 'textarea',
      height: 500,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen image imagetools',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | ' +
      ' bold italic forecolor backcolor image | alignleft aligncenter ' +
      ' alignright alignjustify | bullist numlist outdent indent |' +
      ' removeformat | help code',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ],
      imagetools_cors_hosts: ['mydomain.com', 'otherdomain.com'],
      imagetools_proxy: 'proxy.php'
  });
  </script>
  
</body>

</html>