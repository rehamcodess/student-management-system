<?php
// ابدأ الجلسة
session_start();

// تدمير جميع متغيرات الجلسة (إلغاء تسجيل الدخول)
$_SESSION = array();

// تدمير ملفات تعريف الارتباط الخاصة بالجلسة
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// تدمير الجلسة بالكامل
session_destroy();

// إعادة التوجيه إلى صفحة الشكر (thank_you.html)
header("Location: thank_you.html");
exit;
?>