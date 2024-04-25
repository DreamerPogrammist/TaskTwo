<?php

// Валидация на стороне сервера
function isValid()
{
    // Простейшая валидация для демонстрационных целей. Замените ее на валидацию на стороне сервера
    if ($_POST['name'] != "" && $_POST['email'] != "" && $_POST['message'] != "") {
        return true;
    } else {
        return false;
    }
}

$error_output = '';
$success_output = '';

if (isValid()) {
    $success_output = "Your message sent successfully";

    // Составляем POST-запрос, чтобы получить от Google оценку reCAPTCHA v3
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6LeC28YpAAAAAJSIkc-l-8fXYLLDdEgyYtSAsrIU'; // Insert your secret key here
    $recaptcha_response = $_POST['recaptcha_response'];

    // Выполняем POST-запрос
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
} else {
    // Валидация на стороне сервера не прошла
    $error_output = "Please fill all the required fields";
}

$output = array(
    'error' => $error_output,
    'success' => $success_output
);

// Вывод должен быть в формате JSON
echo json_encode($output);


$recaptcha = json_decode($recaptcha);
// Принимаем действие на основе возвращаемой оценки
if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'contact') {
   // Это человек. Вставляем сообщение в базу данных или отправляем на электронную почту
   $success_output = "Your message sent successfully";
} else {
   // Оценка меньше 0.5 означает подозрительную активность. Возвращаем ошибку
   $error_output = "Something went wrong. Please try again later";
}
?>