<?php 
require_once('../is_login.php');
require_once('../../function/connection.php');
if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  if (!file_exists('../../uploads/products')) {
    mkdir('../../uploads/products', 0755, true);
  }

 
  if(isset($_FILES['picture']['name'])){
    $filename = $_FILES['picture']['name'];
    $file_path = "../../uploads/products/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
  }else{
    $filename = "cake1.jpg";
  }

  $sql= "INSERT INTO products (product_categoryID, picture, name, price, description, created_at) VALUES ( :product_categoryID, :picture, :name, :price, :description, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":product_categoryID", $_POST['product_categoryID'], PDO::PARAM_INT);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

  header('Location: list.php?product_categoryID='.$_POST['product_categoryID']);
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
          <h1 class="mb-4">產品管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"> <a href="#"><i class="fa fa-home"></i> 主控台</a> </li>
            <li class="breadcrumb-item active">產品管理</li>
            <li class="breadcrumb-item active">新增一筆</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <form id="c_form-h" class="" method="post" action="create.php" enctype="multipart/form-data">
            <div class="form-group row"> <label for="picture" class="col-2 col-form-label">圖片</label>
              <div class="col-10">
                <input type="file" class="form-control-file" id="picture" name="picture"> </div>
            </div>
            <div class="form-group row"> <label for="name" class="col-2 col-form-label">產品名稱</label>
              <div class="col-10">
                <input type="text" class="form-control" id="name" name="name"> </div>
            </div>
            <div class="form-group row">
              <label for="price" class="col-2 col-form-label">價格</label>
              <div class="col-10">
                <input type="text" class="form-control" id="price" name="price"> </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-2 col-form-label">產品說明</label>
              <div class="col-10">
                <textarea class="form-control" id="description" name="description"></textarea> 
              </div>
            </div>
            <a class="btn btn-info" href="#">回上一頁</a>
            <button type="submit" class="btn btn-success">確認</button>
            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="AddForm" value="INSERT">
            <input type="hidden" name="product_categoryID" value="<?php echo $_GET['product_categoryID']; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../layouts/footer.php'); ?>
  <script>

   
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