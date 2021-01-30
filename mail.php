<?php
function sendMessage($token, $chatid, $message) {
    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&text=";
    $url .= urlencode($message);
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$token = 'xxxxxxxxxx:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$chatid = 'xxxxxxxxxxx';
$message = $_POST['message'] || 'our your source for message';
$response;
// now execute it:
$result = json_decode(sendMessage($token, $chatid, $message));
if(isset($result->ok) && $result->ok) {
    $response['body'] = 'Congratulations, the message was successfully sent';
} elseif (!$result->ok) {
    $response['error'] = true;
    $response['body'] = $result->error_code . ': ' . $result->description;
} else {
    $response['error'] = true;
    $response['body'] = 'Unknown error. Sorry :(';
};
printf(json_encode($response));
?>