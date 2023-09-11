function sendTextMessage($number, $msg, $ins, $api) {
    $url = "https://app.wapify.net/api/text-message.php";
    
    $data = [
        "number" => $number,
        "msg" => $msg,
        "instance" => $ins,
        "apikey" => $api
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  // Disable SSL verification, might be insecure for production
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // Disable SSL verification, might be insecure for production
    
    $result = curl_exec($ch);
    
    if (curl_errno($ch)) {
        return 'Error: ' . curl_error($ch);
    }
    
    curl_close($ch);

    return $result;
}

// Usage
$number = "91xxxxxxxx";
$msg = "Your Messages";
$ins = "Your Instance Key";
$api = "Your API Key";
$response = sendTextMessage($number, $msg, $ins, $api);
echo $response;
