<?php 

function selectAll_user(){
    $sql = "SELECT * From users";
    return pdo_query($sql);
}

function insert_user($password, $fullname, $user_image, $email){
    $sql = "INSERT INTO users(password, fullname, status, user_image, role, email) 
    VALUES (?, ?, 'Chưa kích hoạt', ?, 'Khách hàng', ?)";
    return pdo_execute($sql, $password, $fullname, $user_image, $email);
}

function insert_user2($password, $fullname, $user_image, $email){
    $sql = "INSERT INTO users(password, fullname, status, user_image, role, email) VALUES (?, ?, 'Đã kích hoạt', ?, 'Nhân viên', ?)";
    return pdo_execute($sql, $password, $fullname, $user_image, $email);
}

function delete_user($id){
    $sql = "DELETE FROM users WHERE user_id = ?";
    return pdo_execute($sql,$id);
}

function update_user($fullname, $psw, $email, $image, $id){
    if($image != ''){
        $sql = "UPDATE users SET fullname = ?, password =?, email =?, user_image =? 
        WHERE user_id = ?";
        pdo_execute($sql, $fullname, $psw, $email, $image, $id);
    } else {
        $sql = "UPDATE users SET fullname = ?, password =?, email =? 
        WHERE user_id = ?";
        pdo_execute($sql, $fullname, $psw, $email, $id);
    }
}

function update_password($password, $email){
    $sql = "UPDATE users SET password = ?, otp = NULL 
    WHERE email = ?";
    pdo_execute($sql, $password, $email);
}

function update_status($status, $email){ 
    $sql = "UPDATE users SET status = ? where email = ?";
    pdo_execute($sql, $status, $email);
}

function update_status_byId($status, $id){ 
    $sql = "UPDATE users SET status = ? where user_id = ?";
    pdo_execute($sql, $status, $id);
}

function update_role($role, $id) {
    $sql = "UPDATE users SET role = ? where user_id = ?";
    pdo_execute($sql, $role, $id);
}

function update_otp($otp, $email) {
    $sql = "UPDATE users SET otp =? where email =?";
    pdo_execute($sql, $otp, $email);
}

function select_by_email_user($email){
    $sql = "SELECT * FROM users WHERE email = ?";
    return pdo_query_one($sql,$email);
}

function select_by_otp_user($otp){
    $sql = "SELECT * FROM users WHERE otp = ?";
    return pdo_query_one($sql,$otp);
}

function select_by_id_user($id){
    $sql = "SELECT * FROM users WHERE user_id = ?";
    return pdo_query_one($sql,$id);
}

function exist_user($id){
    $sql = "SELECT count(*) FROM users WHERE user_id=?";
    return pdo_query_value($sql, $id) > 0;
}

function exist_user_email($email){
    $sql = "SELECT count(*) FROM users WHERE email=?";
    return pdo_query_value($sql, $email) > 0;
}
?>