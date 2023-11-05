<?php 

function selectAll_product(){
    $sql = "SELECT * From products";
    return pdo_query($sql);
}

function selectAll($key, $category) {
    $sql = "SELECT * FROM products AS P 
    INNER JOIN categories AS C ON P.category_id = C.category_id
    INNER JOIN users AS U ON P.user_id = U.user_id
    WHERE 1";
    if ($key != ''){
        $sql .= " AND product_name LIKE '%$key%'";
    }
    if($category > 0){
        $sql .= "  AND P.category_id = $category";
    }

    $sql .= " ORDER BY P.product_id"; 

    return pdo_query($sql);
}

function insert_product($product_name, $price, $sale, $product_image, 
                        $description, $special, $category_id, $user_id) {
    $sql = "INSERT INTO products(product_name, price, sale, product_image, description, special, category_id, user_id, create_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,NOW())";
    return pdo_execute($sql, $product_name, $price, $sale, $product_image, $description, $special, $category_id, $user_id);
}

function delete_product($id){
    $sql = "DELETE FROM products WHERE product_id = ?";
    return pdo_execute($sql,$id);
}

function update_product($product_name, $price, $sale, $product_image, $description, $special, $category_id, $user_id, $id){
    if($product_image != ''){
        $sql = "UPDATE products SET product_name = ?, price = ?, sale = ?, product_image = ?, description = ?, special = ?, category_id = ?, user_id =?, create_date = NOW() WHERE product_id = ?";
        pdo_execute($sql, $product_name, $price, $sale, $product_image, $description, $special, $category_id,$user_id, $id);
    } else {
        $sql = "UPDATE products SET product_name = ?, price = ?, sale = ?, description = ?, special = ?, category_id = ?, user_id =?, create_date = NOW() WHERE product_id = ?";
        pdo_execute($sql, $product_name, $price, $sale, $description, $special, $category_id, $user_id, $id);
    }
}

function select_by_id_product($id){
    $sql = "SELECT * FROM products WHERE product_id = ?";
    return pdo_query_one($sql,$id);
}

function exist_product($id){
    $sql = "SELECT count(*) FROM products WHERE product_id=?";
    return pdo_query_value($sql, $id) > 0;
}

function select_id_category_of_p($category_id){
    $sql = "SELECT * From products where category_id = ? limit 8";
    return pdo_query($sql,$category_id);
}

function select_special_product($value) {
    $sql = "SELECT * From products where special = ?";
    return pdo_query($sql,$value);
}

function select_hot_5_product() {
    $sql = "SELECT * From products ORDER BY create_date DESC LIMIT 5";
    return pdo_query($sql);
}

function select_product_by_C($id){
    $sql = "SELECT * From products where category_id = ?";
    return pdo_query($sql,$id);
}

function view_product($id) {
    $sql = "UPDATE products SET view = view + 1 
            WHERE product_id = ?";
    return pdo_execute($sql, $id);
}
function select_top10_product() {
    $sql = "SELECT * FROM products 
        ORDER BY view DESC LIMIT 10";
    return pdo_query($sql);
}

function select_keyword_product($data) {
    $sql = "SELECT * FROM products AS P 
    INNER JOIN categories AS C ON P.category_id = C.category_id
    where product_name LIKE '%$data%' or category_name LIKE '%$data%'";
    return pdo_query($sql);
}
?>