function change_mode() {
  const $html = document.querySelector("html");
  $html.classList.toggle("white-mode");
}

function open_nav() {
  var x = document.getElementById("navbar");
  if (x.className === "nav-direita-normal") {
    x.className += " nav-direita-resp";
  } else {
    x.className = "nav-direita-normal";
  }
}
