<?php
header("Content-type: application/json");
$data = [];
if ($_POST) {
    $appid = $_POST['appid'];
    $api = $_POST['api'];
    $publickey = $_POST['publicKey'];
    $appkey = $_POST['appkey'];
    $subject = $_POST['subject'];
    $shortCode = $_POST['shortCode'];
    $notifyUrl = $_POST['notifyUrl'];
    $returnUrl = $_POST['returnUrl'];
    $reciverName = $_POST['receiveName'];
    $amount = $_POST['amount'];
    $timeout = $_POST['timeout'];

    $nonce = time();
    $str = rand();
    $result = md5($str);
    $data = [
        'outTradeNo' => $result,
        'subject' => $subject,
        'totalAmount' => $amount,
        'shortCode' => $shortCode,
        'notifyUrl' => $notifyUrl,
        'returnUrl' => $returnUrl,
        'receiveName' => $reciverName,
        'appId' => $appid,
        'timeoutExpress' => $timeout,
        'nonce' => $result,
        'timestamp' => $nonce,
        'appKey' => $appkey
    ];
    ksort($data);
    $StringA = '';
    foreach ($data as $k => $v) {
        if ($StringA == '') {
            $StringA = $k . '=' . $v;
        } else {
            $StringA = $StringA . '&' . $k . '=' . $v;
        }
    }
    $StringB = hash("sha256", $StringA);
    $sign = strtoupper($StringB);
    $ussdjson = json_encode($data);
    $ussd = encryptRSA($ussdjson, $publickey);
    $requestMessage = [
        'appid' => $appid,
        'sign' => $sign,
        'ussd' => $ussd
    ];

    $response = [
        'stat' => "success",
        'data' => json_encode($requestMessage),
    ];

} else {
    $response = [
        'stat' => "Fail",
        'data' => "null"
    ];
}

echo json_encode($response);

function encryptRSA($data, $public)
{
    $pubPem = chunk_split($public, 64, "\n");
    $pubPem = "-----BEGIN PUBLIC KEY-----\n" . $pubPem . "-----END PUBLIC KEY-----\n";
    $public_key = openssl_pkey_get_public($pubPem);

    if (!$public_key) {
        die('invalid public key');
    }
    $crypto = '';
    foreach (str_split($data, 117) as $chunk) {
        $return = openssl_public_encrypt($chunk, $cryptoItem, $public_key);
        if (!$return) {
            return ('fail');
        }
        $crypto .= $cryptoItem;
    }
    $ussd = base64_encode($crypto);
    return $ussd;
}
?>