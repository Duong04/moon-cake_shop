<?php 
    session_start();
    /*
    * Định nghĩa các url cần thiết được sử dụng trong website
    */
    $ROOT_URL = "/XSHOP";
    $ASSETS_URL = "../assets";
    $ADMIN_URL = "../admin";
    $SITE_URL = "../site";
    $UPLOAD_URL = "../uploads";


    function send_mail ($email, $title, $content, $massage){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer;

        try {
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'tinhdz3092004@gmail.com';                    
            $mail->Password   = 'goyc mujp vsqq xvqt';                               
            $mail->SMTPSecure = 'ssl';            
            $mail->Port       = 465;                                   
                
                    //Recipients
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('tinhdz3092004@gmail.com', 'x-shop');
            $mail->addAddress($email); 
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->AltBody = $content;
                
            $mail->send();
                echo $massage;
            } catch (Exception $e) {
                echo "Tạm thời không gửi mail được: {$mail->ErrorInfo}";
            }
    }
        
?>