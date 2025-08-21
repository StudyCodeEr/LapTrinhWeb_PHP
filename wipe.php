<?php
session_start();
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time()-42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Xoá cookies demo
setcookie("fullname", "", time()-3600, "/");
setcookie("email", "", time()-3600, "/");

header("Location: form.php");
exit;
