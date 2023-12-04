#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Our Posts</title>
  </head>

  <body>
    <header>
      <h1>Blog Posts</h1>
    </header>

    <main>
      <div>
      <form method="POST" action="post.php">
        <!-- could do isset for the username cookie. -->
        <label for='author'>Author:</label>

        <input type="text" id='author' name="userName" value='<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : '';?>'>
        <br>

        <label for='content'>Content:</label>
        <textarea name='userContent' id='content'></textarea>
        <br>

        <input type="submit" value="Post">
      </form>
      </div>
    <section>
      <h2>Posts by other users:</h2>
      <pre>
    <?php
        $file = @fopen('posts.txt', 'r'); // 'r' stands for read. 
        // The @ silences any warnings fopen produces.
        // This is okay because we have been careful
        // to check the file loaded in the next if statement.

        if ($file) {
          // $file will be false if the file failed to load.
          // otherwise $file will be coerced to true.

          while (!feof($file)) {
            $line = fgets($file);
            echo $line, '<br>';
          }

          fclose($file);
        }
      ?>
      </pre>
      </section>
    </main>

    <footer>
      <hr>
      <small>
        &copy; Ali Hafezi, 2023
      </small>
    </footer>


  </body>

</html>
