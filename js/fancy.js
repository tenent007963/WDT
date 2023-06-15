// a placeholder function for legacy purpose and script existance checking
function superFancy(e) {
  console.log("test");
}

// form submitting with auto capture parent node and formdata
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
