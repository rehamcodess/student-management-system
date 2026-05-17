<?php
// 1. ابدأ الجلسة
session_start();

$valid_user = "admin";
$valid_pass = "1234";

// 2. معالجة بيانات تسجيل الدخول (إذا تم إرسالها من index.php)
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_user && $password === $valid_pass) {
        // تسجيل الدخول ناجح: قم بتخزين حالة المستخدم في الجلسة
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    } else {
        // تسجيل الدخول فاشل
        echo "<script>alert('❌ Wrong username or password'); window.location='index.php';</script>";
        exit();
    }
}

// 3. فحص الجلسة: إذا لم يكن المستخدم مسجلاً للدخول، قم بإعادته لصفحة الدخول
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Information</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
    <img src="images/collegerey.png" alt="ITC Logo" loading="lazy">
    <h1>College Information</h1>
  <div class="logout-section">
    <form action="logout.php" method="POST">
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>
</header>

<main>
    <div class="main-content"> 
        <h3>Select Information Type:</h3>

        <select id="infoSelect" onchange="showInfo()">
            <option value="">-- Choose --</option>
            <option value="students">Student Information</option>
            <option value="teachers">Teacher Information</option>
        </select>
    </div>

    <table id="studentTable" class="info-table" style="display:none;">
        <tr><th>ID</th><th>Name</th><th>Email</th></tr>
        <tr><td>1</td><td>Reema</td><td>reema@student.com</td></tr>
		<tr><td>1</td><td>Hassan Omar</td><td>HassanOmar@student.com</td></tr>
        <tr><td>2</td><td>Ali</td><td>ali@student.com</td></tr>
    </table>

    <table id="teacherTable" class="info-table" style="display:none;">
        <tr><th>ID</th><th>Teacher Name</th><th>Subject</th><th>Email</th></tr>
        <tr><td>1</td><td>Ali Ahmed</td><td>Math</td><td>ali.ahmed@college.com</td></tr>
        <tr><td>2</td><td>Sara Khalid</td><td>Software Development</td><td>sara.khalid787@college.com</td></tr>
        <tr><td>3</td><td>Mona Salem</td><td>English</td><td>mona.salem@college.com</td></tr>
    </table>

    <footer class="social-media">
        <h3>Connect with Us:</h3>
        <a href="https://linkedin.com" target="_blank">LinkedIn</a> |
        <a href="https://twitter.com" target="_blank">Twitter</a> |
        <a href="https://facebook.com" target="_blank">Facebook</a>
    </footer>
</main>

<script>
function showInfo() {
    var select = document.getElementById("infoSelect").value;
    document.getElementById("studentTable").style.display = (select === "students") ? "table" : "none";
    document.getElementById("teacherTable").style.display = (select === "teachers") ? "table" : "none";
}
</script>

</body>
</html>