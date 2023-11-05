<?php 
require ('../dao/dao_comment.php');
require ('../dao/pdo.php');

if(isset($_GET['comment_id'])){
    delete_comment($_GET['comment_id']);
    $previous_page = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $previous_page);
}
?>