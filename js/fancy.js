// defined function for form submitting due to dynamic content
/*
function superFancy(e) {
    e.preventDefault();
    let mein = document.getElementById('main-form');
    let sub = document.getElementById('search-form');
    let form = (val == "search" ) ? sub : mein;
    try {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("main").innerHTML =
        this.responseText;
        return false;
      }
      xhttp.open("POST", form.action, true);
      xhttp.send(new FormData(form));
    }
    catch (e) {
      console.log(e.message);
      return false;
    }
      return false;
  };
  */
function superFancy(e) { console.log("testing in progress"); };

document.addEventListener('submit', function (event) {

  if (event.target.click) {
    event.preventDefault();
    try {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("main").innerHTML =
        this.responseText;
        return false;
      }
      xhttp.open("POST", event.target.form.action, true);
      xhttp.send(new FormData(event.target.form));
    }
    catch (event) {
      console.log(event.message);
      return false;
    }
  }
  return false;
});