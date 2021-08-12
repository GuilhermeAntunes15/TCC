// COOKIES P/ TEMA
var html = document.querySelector("html");
var navbar = document.getElementById("navbar"); // pega a navbar pra deixar responsiva

// MANTÉM TEMA QUANDO ENTRA NO SITE COM OS COOKIES
if (Cookies.get("mid-mode")) {
  html.className = "mid-mode";
} else if (Cookies.get("white-mode")) {
  html.className = "white-mode";
} else if (Cookies.get("black-mode")) {
  html.className = "black-mode";
} else {
  html.className = "black-mode";
}

// MUDAR TEMA
function change_mode() {
  if (html.className == "black-mode") {
    Cookies.remove("white-mode");
    Cookies.remove("black-mode");
    Cookies.set("mid-mode", true, { secure: true }, { expires: 365 });
    html.className = "mid-mode";
    console.log("Tema alterado para mid-mode.");
  } else if (html.className == "mid-mode") {
    Cookies.remove("mid-mode");
    Cookies.remove("black-mode");
    Cookies.set("white-mode", true, { secure: true }, { expires: 365 });
    html.className = "white-mode";
    console.log("Tema alterado para white-mode.");
  } else {
    Cookies.remove("white-mode");
    Cookies.remove("mid-mode");
    Cookies.set("black-mode", true, { secure: true }, { expires: 365 });
    html.className = "black-mode";
    console.log("Tema alterado para black-mode.");
  }
}

// NAVBAR RESPONSIVA
function resp_nav() {
  if (navbar.className === "navbar") {
    navbar.className += " responsivo";
  } else {
    navbar.className = "navbar";
  }
}
