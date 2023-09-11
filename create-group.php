function createGroup($member, $group_name, $ins, $api) {
    $url = "https://app.wapify.net/api/create-group.php";
    
    $data = [
        "member" => $member,
        "group_name" => $group_name,
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
$member = "91xxxxxxxx,91xxxxxxx,91xxxxxxx"; //Can Add Multi Number For Members
$group_name = "My Group";
$ins = "Your Instance Key";
$api = "Your API Key";
$response = createGroup($member, $group_name, $ins, $api);
echo $response;
