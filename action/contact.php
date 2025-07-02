<?php




$user_email = strip_tags($_POST['user_email']);
$user_name = strip_tags($_POST['user_name']);
$user_tel = strip_tags($_POST['user_tel']);
$user_message = strip_tags($_POST['user_message']);


$to = "workmail1010@gmail.com";
$message = `
اســـم العميل :  $user_name 
البريد الالكتروني : $user_email
رقم الجوال : $user_tel
الرسالة : $user_message
`;

$subject = "رسالة عميل من موقع صـــيب"; 


// Set the headers
$headers = "From: saiebbservices@gmail.com\r\n";
$headers .= "Reply-To: $user_email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Use the mail() function to send the email
if (mail($to, $subject, $message, $headers)) {
    echo "1";
} else {
    echo "2";
}


