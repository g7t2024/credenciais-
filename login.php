<?php
session_start();

$credentialsFile = 'credentials.txt';
$redirectPage = 'welcome.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $savedCredentials = file($credentialsFile, FILE_IGNORE_NEW_LINES);

    if (in_array("$username:$password", $savedCredentials)) {
        $_SESSION['authenticated'] = true;
        header("Location: $redirectPage");
        exit;
    } else {
        header("Location: index.html?error=1");
        exit;
    }
}
?>
