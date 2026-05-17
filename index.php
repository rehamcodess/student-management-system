<?php
session_start();

// إنهاء الجلسة عند الضغط على Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// منع ظهور التحذيرات داخل الصفحة
error_reporting(0);

$username_value = "";
$password_value = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>College Website</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <header>
    <img src="images/collegerey.png" alt="ITC Logo" loading="lazy" />
    <h1>Welcome to Our College</h1>
  </header>

  <main>
    <section class="login-section">
      <h2>Login</h2>
      <form action="information.php" method="post" autocomplete="off">
        <label>Username:</label>
        <input type="text" name="username" value="" required autocomplete="off"><br>

        <label>Password:</label>
        <input type="password" name="password" value="" required autocomplete="off"><br>

        <button type="submit">Login</button>
      </form>
    </section>

    <section class="video">
      <h3>About Our College</h3>
      <iframe width="420" height="250"
              src="https://www.youtube.com/embed/Yc2cnEtr5ZI?si=IPzcea8ZvBV9erdc"
              title="YouTube video player"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
      </iframe>
    </section>

    <section class="tiktok">
      <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@itfckhobar" data-unique-id="itfckhobar" data-embed-type="creator" style="max-width: 780px; min-width: 288px;">
        <section>
          <a target="_blank" href="https://www.tiktok.com/@itfckhobar?refer=creator_embed">@itfckhobar</a>
        </section>
      </blockquote>
      <script async src="https://www.tiktok.com/embed.js"></script>
    </section>

    <footer class="social-media">
      <h3>Connect with Us:</h3>
      <a href="https://linkedin.com" target="_blank" rel="noopener">LinkedIn</a> |
      <a href="https://twitter.com" target="_blank" rel="noopener">Twitter</a> |
      <a href="https://facebook.com" target="_blank" rel="noopener">Facebook</a>
    </footer>
  </main>
</body>
</html>
