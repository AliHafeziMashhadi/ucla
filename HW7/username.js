function validate_username(username) {

  if (username === '') {
    const cookieParts = document.cookie.split('; ');

    for (const part of cookieParts) {
        if (part.startsWith('username=')) {
            username = part.substring('username='.length);
            break;
        }
    }

    if (username === '' && cookieParts.includes('username')) {
        const usernameIndex = cookieParts.indexOf('username') + 1;
        if (usernameIndex < cookieParts.length) {
            username = cookieParts[usernameIndex].split('=')[1] || '';
        }
    }
  }
  if (username === '' && window.location.pathname.split('/').pop() != "login.php") {
        window.location.href = "login.php";
        return;
    }
  else {
  let errors = [];

  if (username.length < 5) {
      errors.push("Username must be 5 characters or longer.");
  }
  if (username.length > 40) {
      errors.push("Username cannot exceed 40 characters.");
  }
  if (username.includes(" ")) {
      errors.push("Username cannot contain spaces.");
  }
  if (username.includes(",")) {
      errors.push("Username cannot contain commas.");
  }
  if (username.includes(";")) {
      errors.push("Username cannot contain semicolons.");
  }
  if (username.includes("=")) {
      errors.push("Username cannot contain =.");
  }
  if (username.includes("&")) {
      errors.push("Username cannot contain &.");
  }

  let allowedChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^*()-_+[]{}:'|`~<.>/?";
  let valid = true;

  for (let i = 0; i < username.length; i++) {
      let char = username[i];
      if (!allowedChars.includes(char)) {
          valid = false;
          break;
      }
  }

  if (!valid && errors.length === 0) {
      alert("Username can only use characters from the following string:\n abcdefghijklmnopqrstuvwxyz \n ABCDEFGHIJKLMNOPQRSTUVWXYZ \n 0123456789 \n !@#$%^*()-_+[]{}:'|`~<.>/?");
      return;
  }

  if (errors.length > 0) {
      for (let error of errors) {
          alert(error);
      }
      document.cookie = (`usernameValid=false`);
  } else {
    if (window.location.pathname.split('/').pop() === "login.php") {
      document.cookie = (`username=${username}; expires=${minute_in_future()}`)
      document.cookie = (`usernameValid=true`);
      window.location.href = "index.php";  } }
  }
  document.getElementById('greeting').innerHTML = `Hello ${usernameFromCookie}!`;
}