<?php 

function selectAll_comment(){
    $sql = "SELECT * From comments";
    return pdo_query($sql);
}

function selectAll_comment2($id) {
    $sql = "SELECT * FROM comments as C
    JOIN products as P ON  P.product_id = C.product_id
    JOIN users as U ON  U.user_id = C.user_id 
    where P.product_id =?";
    return pdo_query($sql, $id);
}

function selectAll_comment3() {
    $sql = "SELECT * FROM comments as C
    JOIN products as P ON  P.product_id = C.product_id
    JOIN users as U ON  U.user_id = C.user_id";
    return pdo_query($sql);
}

function insert_comment($content, $user_id, $product_id){
    $sql = "INSERT INTO comments(content, user_id, product_id, comment_date) 
    VALUES(?, ?, ?, NOW())";
    return pdo_execute($sql, $content, $user_id, $product_id);
}   

function delete_comment($id){
    $sql = "DELETE FROM comments WHERE comment_id = ?";
    return pdo_execute($sql,$id);
}

function select_by_id_comment($id){
    $sql = "SELECT * FROM comments WHERE comment_id = ?";
    return pdo_query_value($sql, $id);
}

function exist_comment($id){
    $sql = "SELECT count(*) FROM comments WHERE product_id=?";
    return pdo_query_value($sql, $id) > 0;
}

function binh_luan_select_by_hang_hoa(){}
?>