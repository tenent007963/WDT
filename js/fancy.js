// defined function for form submitting due to dynamic content
//two tests
function superFancy(e) {
  var scripts = document.querySelectorAll("script");
  var text = scripts[scripts.length - 1].textContent;
  (0, eval)(scripts[scripts.length - 1].textContent);
}

document.addEventListener('submit', function (event) {
  event.preventDefault();
  let form = document.getElementById(event.target.id);
  try {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("main").innerHTML = this.responseText;
      return false;
    }
    xhttp.open("POST", event.target.getAttribute("action"), true);
    xhttp.send(new FormData(form));
  }
  catch (e) {
    console.log(e.message);
    return false;
  }
  return false;
});

var scripts = document.querySelectorAll("script");
  var text = scripts[scripts.length - 1].textContent;
  (0, eval)(scripts[scripts.length - 1].textContent);