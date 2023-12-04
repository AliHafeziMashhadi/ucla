// would be nice at the end to consolidate all error messages into one alert.
// command + shift + R to hard reload  

let usernameFromCookie = extract_cookie_value(document.cookie, 'username');

function extract_cookie_value(cookie, name) {
    const nvs = cookie.split('; '); // returns array of all name value pairs 
  
    if (name !== '') {
      for (const nv of nvs) {
        if (nv.startsWith(name + '=')) {
          return nv.substring(name.length + 1);
        }
      }
    }
    else {
      for (const nv of nvs) {
        if (!nv.includes('=')) {
          return nv;
        }
      }
    }
  
    return '';
  }


/*document.addEventListener('DOMContentLoaded', function() {
    validate_username('');
});  */

function minute_in_future() {
    let minute_in_future = new Date();
    minute_in_future.setMinutes(minute_in_future.getMinutes() + 60);
    return minute_in_future.toUTCString();
  }



  /*
$('#submit').on('click', function() {
    let username = document.getElementById('usernameInput').value;
    validate_username(username);
});

$('#usernameInput').on('keydown', function(event) {
	let username = document.getElementById('usernameInput').value;
    if (event.which === 13) { // 13 is the key code for "Enter"
        validate_username(username);
    }
});

$('#pass').on('keydown', function(event) {
    let username = document.getElementById('usernameInput').value;
    if (event.which === 13) { // 13 is the key code for "Enter"
        validate_username(username);
    }
});
*/
document.addEventListener('submit', function() {
  let username = document.getElementById('usernameInput').value;
    validate_username(username);
  if (usernameFromCookie) {
    const usernameInput = document.getElementById('usernameInput');
      usernameInput.value = usernameFromCookie;
  } 
});

document.addEventListener('DOMContentLoaded', function() {
  if (window.location.pathname.split('/').pop() === "login.php") {
  if (usernameFromCookie) {
    const usernameInput = document.getElementById('usernameInput');
    if (usernameInput) {
      usernameInput.value = usernameFromCookie;
    }
  } }
});