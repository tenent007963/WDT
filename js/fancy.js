// defined function for form submitting due to dynamic content
//two tests
function superFancy(e) {
  setInterval(10000);
  try {
  const scripts = document.getElementsByTagName("script");
  var script = scripts[0];
  var newScript = document.createElement("script");
  if (script.textContent) {
    newScript.textContent = script.textContent;
  } else if (script.innerText) {
    newScript.innerText = script.innerText;
  }
  document.body.appendChild(newScript);
  } 
  catch (e) {
    console.log(e.message);
  }
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