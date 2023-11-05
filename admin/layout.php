<?php 
    require_once('../dao/dao_category.php');
    require_once('../dao/dao_product.php');
    require_once('../dao/dao_user.php');
    require_once('../dao/dao_comment.php');
    require_once('../dao/dao_statistical.php');
    require('../dao/pdo.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>XSHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .container {
        width: 1300px;
        margin: auto;
    }

    .container h2 {
        display: flex;
        align-items: center;
        width: 100%;
        height: 60px;
        background-color: #ddedd5;
        padding-left: 20px;
        color: #386443;
    }

    .container ul {
        width: 100%;
        height: 55px;
        background-color: #000;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .container ul a {
        color: #fff;
    }

    .container h3 {
        margin-top: 20px;
        color: #080808;
    }

    .form-child {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        justify-content: space-between;
        gap: 25px;
        margin-bottom: 10px;
    }

    #form-p textarea {
        width: 100%;
    }

    .img {
        width: 100px;
    }

    .img img{
        width: 100%;
    }

    .flex {
        display: flex;
        gap: 20px;
    }

    .form-select {
        height: 40px;
    }

    .form-grid {
        display: flex;
        grid-template-columns: 100px 80px 30px;
        gap: 15px;
        margin: 20px 0;
    }
  </style>
</head>
<body>
    <div class="container mt-3">
        <h2>Quản trị website</h2>
        <?php include "menu.php" ?>
        <?php 
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                switch($action) {
                    // categories
                    case 'add-category':
                        if(isset($_POST['add-c']) && $_POST['add-c']) {
                            if(isset($_POST['name'])) {
                                if(isset($_SESSION['user_id'])){
                                    $user_id = $_SESSION['user_id'];
                                }
                                insert_category($_POST['name'], $user_id);
                            }
                        }
                        include './categories/add-category.php';
                        break;
                    case 'category':
                        $list_c = selectAll_join_category();
                        include './categories/category.php';
                        break;
                    case 'delete-c':
                        if(isset($_GET['id'])){
                            delete_category($_GET['id']);
                        }
                        $list_c = selectAll_join_category();
                        include './categories/category.php';
                        break;
                    case 'update-category':
                        if(isset($_GET['id'])){
                            $list_new = select_by_id_category($_GET['id']);
                        }
                        include './categories/update-category.php';
                        break;
                    case 'update-c':
                        if(isset($_POST['update-c']) && $_POST['update-c']) {
                            $id = $_POST['id'];
                            if(isset($_POST['name'])) {
                                if(isset($_SESSION['user_id'])){
                                    $user_id = $_SESSION['user_id'];
                                }
                                update_category($id, $_POST['name'], $user_id);
                            }
                        }
                        $list_c = selectAll_join_category();
                        include './categories/category.php';
                        break;
                    // products
                    case 'add-product':
                        if(isset($_POST['add-p']) && $_POST['add-p']) {
                            if(isset($_POST['name']) && isset($_POST['price']) && isset($_FILES['hinh']) && isset($_POST['desciption']) && isset( $_POST['category_id'])) {
                                $product_name = $_POST['name'];
                                $price = $_POST['price'];
                                $sale = $_POST['sale'];
                                $image = $_FILES['hinh']['name'];
                                $target_dir = "../uploads/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                $special = $_POST['special'];
                                $description = $_POST['desciption'];
                                $category_id = $_POST['category_id'];
                                if(isset($_SESSION['user_id'])){
                                    $user_id = $_SESSION['user_id'];
                                }
                                insert_product($product_name, $price, $sale, $image, $description, $special, $category_id, $user_id);
                            }
                        }
                        include './products/add-p.php';
                        break;
                    case 'products':
                        if(isset($_POST['ok'])){
                            $key = $_POST['key'];
                            $category = $_POST['category'];
                        }else {
                            $key = '';
                            $category = 0;
                        }
                        $list_p = selectAll($key, $category);
                        include './products/product.php'; 
                        break;
                    case 'delete-p':
                        if(isset($_GET['id'])){
                            delete_product($_GET['id']);
                        }
                        if(isset($_POST['ok'])){
                            $key = $_POST['key'];
                            $category = $_POST['category'];
                        }else {
                            $key = '';
                            $category = 0;
                        }
                        $list_p = selectAll($key, $category);
                        include './products/product.php'; 
                        break;
                    case 'update-product':
                        if(isset($_GET['id'])){
                            $list_new = select_by_id_product($_GET['id']);
                        }
                        include './products/update-p.php'; 
                        break;
                    case 'update-p':
                        if(isset($_POST['update-p']) && $_POST['update-p']) {
                                $id = $_POST['id'];
                            if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['desciption']) && isset( $_POST['category_id'])) {
                                $product_name = $_POST['name'];
                                $price = $_POST['price'];
                                $sale = $_POST['sale'];
                                $image = $_FILES['hinh']['name'];
                                $target_dir = "../uploads/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                $special = $_POST['special'];
                                $description = $_POST['desciption'];
                                $category_id = $_POST['category_id'];
                                if(isset($_SESSION['user_id'])){
                                    $user_id = $_SESSION['user_id'];
                                }
                                update_product($product_name, $price, $sale, $image, $description, $special, $category_id, $user_id,$id);
                            }
                        }
                        if(isset($_POST['ok'])){
                            $key = $_POST['key'];
                            $category = $_POST['category'];
                        }else {
                            $key = '';
                            $category = 0;
                        }
                        $list_p = selectAll($key, $category);
                        include './products/product.php'; 
                        break;
                    // Users
                    case 'user':
                        $list_c = selectAll_user();
                        include './users/user.php';
                        break;
                    case 'update-role':
                        if(isset($_GET['id'])){
                            $client = 'Khách hàng';
                            update_role($client, $_GET['id']);
                        }
                        $list_c = selectAll_user();
                        include './users/user.php';
                        break;
                    case 'update-role2':
                        if(isset($_GET['id'])){
                            $staff = 'Nhân viên';
                            update_role($staff, $_GET['id']);
                        }
                        $list_c = selectAll_user();
                        include './users/user.php';
                        break;
                    case 'add-user':
                        if(isset($_POST['add-u']) && $_POST['add-u']) {
                            if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_FILES['hinh']) && isset($_POST['psw']) && isset($_POST['confirm-psw'])) {
                                $fullname = $_POST['fullname'];
                                $email = $_POST['email'];
                                $image = $_FILES['hinh']['name'];
                                $target_dir = "../uploads/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                $psw = $_POST['psw'];
                                $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);
                                if(password_verify($_POST['confirm-psw'], $hashedPsw)){
                                    insert_user2($$hashedPsw, $fullname, $image, $email);
                                }else {
                                    $error = 'Mật khẩu nhập lại không khớp';
                                }
                            }
                        }
                        include './users/add-user.php';
                        break;
                    case 'update-status':
                        $status = 'Đã kích hoạt';
                        if(isset($_GET['id'])){
                            update_status_byId($status, $_GET['id']);
                        }
                        $list_c = selectAll_user();
                        include './users/user.php';
                        break;
                    case 'update-status2':
                        $status = "Vô hiệu hóa";
                        if(isset($_GET['id'])){
                            update_status_byId($status, $_GET['id']);
                        }
                        $list_c = selectAll_user();
                        include './users/user.php';
                        break;
                    case 'comment':
                        $list = selectAll_comment3();
                        include './comment/comment.php';
                        break;
                    case 'delete-comment':
                        if(isset($_GET['id'])){
                            delete_comment($_GET['id']);
                        }
                        $list = selectAll_comment3();
                        include './comment/comment.php';
                        break;
                    case 'tk':
                        $list = product_statistics();
                        include './tk/list.php';
                        break;
                    case 'chart':
                        $list = product_statistics();
                        include './tk/chart.php';
                        break;
                    default:   
                }
            }
        ?>
    </div>
    <script src="https://cdn.tiny.cloud/1/p5ly35aialm9wqtcnnsc2bdowx8i41312ww5ar3mdmjhs9pz/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#textarea2',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
    </script>
    <script>
    tinymce.init({
      selector: '#textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
    </script>
</body>
</html>
