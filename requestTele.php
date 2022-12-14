<?php
header("Content-type: application/json");
if ($_POST) {
    $api = $_POST['api'];
    $requestMessage = $_POST['reqMessage'];

    $curl = curl_init($api);
    curl_setopt($curl, CURLOPT_URL, $api);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = $requestMessage;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    // var_dump($resp);

    $decode = json_decode($resp, true);
    $url = $decode['data']['toPayUrl'];

    $response = [
        'stat' => "success",
        'data' => $resp,
        'payurl' => $url
    ];
    echo json_encode($response);
    // header("Location:" . $response);
    // die();
}else{
    $response = [
        'stat' => "fail",
        'data' => "null",
    ];
    echo json_encode($response);
}
?>