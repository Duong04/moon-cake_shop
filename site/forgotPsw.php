<?php 
require ('../global.php');
require ('../dao/dao_user.php');
require('../dao/pdo.php');

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $otp = rand(111111,999999);
    if (!update_otp($otp, $email)) {
        $title = "Reset password";
        $content = "Nhấp vào liên kết để đổi mật khẩu -> http://localhost/php/xshop/site/resetPsw.php?otp=". $otp;
        $massage = "<script>alert('Vui lòng check mail để kích hoạt tài khoản');</script>";
        send_mail($email, $title, $content, $massage);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Inclusive+Sans&family=Lobster&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/header.css">
    <link rel="stylesheet" href="<?=$ASSETS_URL?>/css/footer.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        :root {
            --main-color: #c1322f;
            --cream-color: #faf5e1;
            --white-color: #fff;
            --black-color: #000;
            --yellow-color: #f7a825;
        }

        a {
            text-decoration: none;
        }

        article {
            width: 100%;
            margin: auto;
        }

        article form {
            margin: 100px auto;
            width: 400px;
            height: 200px;
            box-shadow: rgb(0 0 0 / 10%) 1px 1px 5px 5px;
            display: flex;
            flex-direction: column;
            border-radius: 8px;
        }

        article input, button {
            width: 90%;
            height: 45px;
            margin: 10px auto;
            border: none;
            border: 2px solid #ccc;
            font-family: 'Inclusive Sans', sans-serif;
            border-radius: 5px;
        }

        article input{
            margin-top: 40px;
            padding-left: 10px;
        }

        article button{
            background-color: var(--main-color);
            color: #fff;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        article button:hover{
            background-color: var(--yellow-color);
        }

        article input:focus {
            outline: none;
            border: 2px solid var(--yellow-color);
        }

    </style>
</head>
<body>
    <div class="main">
    <?php  
        include("header.php");
    ?>
    <article>
        <form action="" method="post">
            <input required type="email" name="email" placeholder="Nhập email của bạn">
            <button>Gửi mail</button>
        </form>
    </article>
    <?php 
        include('footer.php');
    ?>
    </div>
</body>
</html>