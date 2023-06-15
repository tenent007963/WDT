// defined function for form submitting due to dynamic content
//two tests
function superFancy(e) {
  console.log("test");
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
