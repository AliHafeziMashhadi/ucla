#!/usr/local/bin/php
<?php
if (isset($_COOKIE['username'])) {
  echo "Hello {$_COOKIE['username']}";
  echo '<pre>';
              print_r($_POST);
              echo '</pre>';
}
else {
  echo 'Cookie not set.';
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
  </head>

  <body>
    <header>
      <span id='greeting'></span>
      <h1>Some recent posts by other users:</h1>
    </header>

    <main>
      <div>
        <b>malicious666:</b>
        <p>
          Could anyone see how I can fix my <a href="scarf1.html" target="_blank" rel="opener">scarf</a>? Please help. I’m so sad. Here’s a <a href="scarf2.html" target="_blank" rel="opener">picture</a> of the other side.
        </p>
      </div>
      <b>friendlyuser:</b>
      <p>
        First!
      </p>

    </main>

    <footer>
      <hr>
      <small>
        &copy; Ali Hafezi, 2023
      </small>
    </footer>


  </body>

</html>
