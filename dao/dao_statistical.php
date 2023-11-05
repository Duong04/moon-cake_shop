<?php 
    function product_statistics(){
        $sql = "SELECT categories.category_name as name_c, 
                categories.category_id as id_c, 
                count(products.product_id) as countP, 
                sum(products.view) as total_views, 
                min(products.price) as minP, 
                max(products.price) as maxP, 
                avg(products.price) as avgP";
        $sql .= " FROM products 
                LEFT JOIN categories ON products.category_id = categories.category_id";
        $sql .= " GROUP BY categories.category_id 
                ORDER BY categories.category_id";
        return pdo_query($sql);
    }
    function comment_statistics(){}
?>