<?php


// https://api.telegram.org/bot1799092184:AAHFtJRT6EGKpoK-uPMcnczi4-DMUWg9jMg/getUpdates

//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$adress = $_POST['user_adress'];




//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1799092184:AAHFtJRT6EGKpoK-uPMcnczi4-DMUWg9jMg";

//нужнo вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-558926904";

//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Email' => $email
);

//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Thank you";
} else {
  echo "Error";
}
?>