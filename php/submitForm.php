<?php 
//if(isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $to = "nekomori.2106@mail.ru"; // this is your Email address
    $name = $_POST['userName'];
    $phone = $_POST['userPhone'];
    $date = $_POST['birthDate'];
    $from = "me@example.com"; // this is the sender's Email address
    
    $subject = $_POST['userName'];
    $message = $name . "\n\n" . $phone . "\n\n" . $date;
    $headers = "From:" . $from;
    
    if (mail($to,$subject,$message,$headers)) {
        echo htmlspecialchars($_POST['userName']), ", Ваша форма успешно отправлена!",'<br />';
    } else {
        echo "Ошибка отправки формы";
    }
}
?>