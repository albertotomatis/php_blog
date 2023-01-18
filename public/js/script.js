
/* mostra o nascondi psw */
function showPwd() {
    var input = document.getElementById('pwd');
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  }


