<?php
// работа с данным скриптом показана в видео на сайте http://rek9.ru/otpravka-zayavok-v-google-forms/
// формируем запись в таблицу google (изменить)
$url = "https://docs.google.com/forms/u/2/d/e/1FAIpQLSeNAma3R9EY2_ndqTrGZbjOE9ByX0mLjUNV3E3RoEFW_vQPWA/formResponse";
// сохраняем url, с которого была отправлена форма в переменную utm
$utm = $_SERVER["HTTP_REFERER"];
// ссылка для переадресации (изменить)
$link = "http://rek9.ru/";

// массив данных (изменить entry, draft и fbzx)
$post_data = array (
 "entry.1099839174" => $_POST['name'],
 "entry.1636927638" => $_POST['phone'],
 "entry.993469885" => $_POST['comment'],
 "entry.882829627" => $utm,
 "draftResponse" => "[null,null,&quot;4980282613034402666&quot;]",
 "pageHistory" => "0",
 "fbzx" => "55555555555555"
);

// Далее не трогать
// с помощью CURL заносим данные в таблицу google
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// указываем, что у нас POST запрос
curl_setopt($ch, CURLOPT_POST, 1);
// добавляем переменные
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//заполняем таблицу google
$output = curl_exec($ch);
curl_close($ch);

//перенаправляем браузер пользователя на скачивание оффера по нашей ссылке
header('Location: '.$link);
?>