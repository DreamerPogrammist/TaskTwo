<?php 
//if(isset($_POST['submit'])){
    echo htmlspecialchars($_POST['userName']), ", Ваша форма успешно отправлена!",'<br />';

    $to = "nekomori.2106@mail.ru"; // this is your Email address
    $from = $_POST['userMail']; // this is the sender's Email address
    $name = $_POST['userName'];
    $phone = $_POST['userPhone'];
    $date = $_POST['birthDate'];
    
    $subject = "Form submission";
    // $subject2 = "Copy of your form submission";
    $message = $from . "\n\n" . $name . "\n\n" . $phone . "\n\n" . $date;
    // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    //}
?>