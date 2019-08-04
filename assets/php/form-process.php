<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Ім'я обов'язкове ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email обов'язковий' ";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Тема обов'язкова' ";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Повідомлення обов'язкове' ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "frankligothic14@gmail.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Ім'я: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Тема: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Повідомлення: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Дякуємо, повідомлення відправлено";
}else{
    if($errorMSG == ""){
        echo "Щось пішло не так :(";
    } else {
        echo $errorMSG;
    }
}

?>