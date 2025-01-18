
const users = {
  "Basanta": "password1",
  "Sandip": "password2",
  "Sujan": "password3"
};

function validateForm() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const usernameError = document.getElementById("usernameError");
  const passwordError = document.getElementById("passwordError");

  console.log("success")
  usernameError.innerText = "";
  passwordError.innerText = "";

  if (!users[username]) {
    usernameError.innerText = "Invalid username.";
    // return false;
  }

  if (users[username] !== password) {
    passwordError.innerText = "Invalid password.";
    // return false;
  }

  // Redirect to the next page if username and password are valid
  window.location.href = "./../../E-Notes/public/admin.html";
  console.log("success")
//   return false;
}