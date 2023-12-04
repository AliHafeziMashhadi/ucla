#!/usr/local/bin/php
<?php
  // IMPORTANT: The lack of a blank line between
  // #!/usr/local/bin/php and <?php is essential.

  // SETTING UP OR RESUMING A SESSION
  session_save_path(__DIR__ . '/sessions/');
  session_name('myWebpage');
  session_start();


  // At the beginning,
  // there has not been an incorrect submission.
  $incorr_submiss = false;

  // If a password has been submitted,
  // we should check it and update
  // $incorr_submiss and $_SESSION['loggedin']
  // accordingly.
  if ($_COOKIE['usernameValid'] === 'false') {
  }
  elseif (isset($_POST['passwordSubmitted'])) {
    validate($_POST['passwordSubmitted'], $incorr_submiss);
  }

  function validate($submiss, &$incorr_submiss) {
    // Using die is not good coding practice, but
    // I don't wish to clutter up our current code
    // by handling this situation more gracefully.
    $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');

    // We obtain the hashed password
    // (removing any surrounding whitespace).
    $hashed_password = fgets($file);
    $hashed_password = trim($hashed_password);

    fclose($file);


    // We hash the submission using the same algorithm
    // as when we hashed the actual password.
    $hashed_submiss = hash('md2', $submiss);

    if ($hashed_submiss !== $hashed_password) {
      $_SESSION['loggedin'] = false;
      $incorr_submiss = true;
    }
    elseif (!isset($_COOKIE['username'])) {
      echo '$_COOKIE[\'username\'] is not set'; 
    }
    else {
      $_SESSION['loggedin'] = true;
      header('Location: index.php');
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" defer></script>
    <script src="login.js?v=10" defer></script>
    <script src="username.js" defer></script>
  </head>

  <body>
    <header>
      <h1>Welcome! Ready to check out my webpage? </h1>
    </header>

    <main>
        <div>
            <h2>Enter a username.</h2>
            <p>So that you can make your own posts and purchases, select a username and password.</p>
            <section>
      
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="usernameInput">Username: </label>
                <input id="usernameInput" type="text" name="usernameSubmitted"> <!-- name is the key we'd find this under. -->
                <label for="passwordEntry">Password: </label>
                <input id="passwordEntry" type="password" name="passwordSubmitted"> <!-- name is the key we'd find this under. -->
                <input type="submit" value="Login">
              </form>
              <?php
              echo '<pre>';
              print_r($_POST);
              echo '</pre>';
              if ($incorr_submiss) {
                  echo '<p>Invalid password!</p>';
                }
              ?>
            </section>
          </div>
    </main>

    <footer>
      <hr>
      <small>
        &copy; Ali Hafezi, 2023
      </small>
    </footer>
  </body>

</html>
