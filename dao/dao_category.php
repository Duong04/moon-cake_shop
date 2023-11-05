<?php 

function selectAll_category(){
    $sql = "SELECT * From categories";
    return pdo_query($sql);
}

function selectAll_join_category(){
    $sql = "SELECT * FROM categories AS C 
    INNER JOIN users AS U ON C.user_id = U.user_id 
    WHERE 1";
    return pdo_query($sql);
}

function insert_category($name,$user_id){
    $sql = "INSERT INTO categories(category_name,user_id) 
    VALUES(?,?)";
    return pdo_execute($sql,$name, $user_id);
}

function delete_category($id){
    $sql = "DELETE FROM categories WHERE category_id = ?";
    return pdo_execute($sql,$id);
}

function update_category($id, $name, $user_id){
    $sql = "UPDATE categories SET category_name=?, user_id =? WHERE category_id=?";
    pdo_execute($sql, $name, $user_id, $id);
}

function select_by_id_category($id){
    $sql = "SELECT * FROM categories WHERE category_id = ?";
    return pdo_query_one($sql,$id);
}

function exist_category($id){
    $sql = "SELECT count(*) FROM categories WHERE category_id=?";
    return pdo_query_value($sql, $id) > 0;
}

function count_product_of_category($id){
    $sql = "SELECT count(*) FROM products WHERE category_id=?";
    return pdo_query_value($sql, $id);
}

?>