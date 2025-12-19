document.addEventListener("DOMContentLoaded", function () {

  var heading = document.querySelector("h1");
  if (heading) {
    heading.style.color = "darkgreen";
    heading.style.textAlign = "center";
  }
  
  function validateLogin() {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (email === "" || password === "") {
        alert("Please fill all fields");
        return false;
    }
    return true;
}

function validateSignup() {
    var name = document.forms["signupForm"]["name"].value;
    var email = document.forms["signupForm"]["email"].value;
    var password = document.forms["signupForm"]["password"].value;

    if (name === "" || email === "" || password === "") {
        alert("Please fill all required fields");
        return false;
    }
    return true;
}

 var form = document.getElementById("loginForm");
 var nameInput = document.getElementById("username");
 var passInput = document.getElementById("pwd");
 var loginLink = document.querySelector("a[href='category.html']");

  function validateInputs() {
    var nameValue = nameInput.value;
    var passValue = passInput.value;

    if (nameValue === "" || passValue === "") {
      alert("Please enter both your username and password before continuing.");
      if (nameValue === "") {
        nameInput.style.border = "2px solid red";
      }
      if (passValue === "") {
        passInput.style.border = "2px solid red";
      }
      return false;
    } else {
      nameInput.style.border = "2px solid darkolivegreen";
      passInput.style.border = "2px solid darkolivegreen";
      return true;
    }
  }

  if (loginLink) {
    loginLink.addEventListener("click", function (event) {
      if (!validateInputs()) {
        event.preventDefault(); 
      } else {
        alert("Hi, Welcome " + nameInput.value + "!");
      }
    });
  }

  
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault(); 
      if (validateInputs()) {
        alert("Welcome, " + nameInput.value + "!");
        window.location.href = "category.html";
      }
    });
  }
  
  

  var links = document.querySelectorAll("a");
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener("mouseover", function () {
      this.style.backgroundColor = "darkgreen";
      this.style.color = "white";
      this.style.borderRadius = "8px";
    });
    links[i].addEventListener("mouseout", function () {
      this.style.backgroundColor = "";
      this.style.color = "";
    });
  }

  
  var buttons = document.querySelectorAll("button, a");
  for (var j = 0; j < buttons.length; j++) {
    buttons[j].addEventListener("mousedown", function () {
      this.style.border = "2px inset darkgreen";
    });
    buttons[j].addEventListener("mouseup", function () {
      this.style.border = "";
    });
  }
  
  
});