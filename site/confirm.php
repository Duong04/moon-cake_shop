<?php 
    require ('../dao/dao_user.php');
    require('../dao/pdo.php');

    if(isset($_GET['email'])){
        $status = 'Đã kích hoạt';
        $result = update_status($status,$_GET['email']);
        if(!$result){
            header('Location: login.php');
        }
    }
?>