// jquery load method for menu & navbar: 
$(function() {
    $("#menu > a").click(function(e) {
        e.preventDefault(); 
        pushHTML(this.href);
    });
});
$(function() {
  $("#navbar > a").click(function(e) {
      e.preventDefault(); 
      pushHTML(this.href);
  });
});

// core function for loading page
function pushHTML(ref) {
  $("#main").load(ref, function() {
    //trigger listener after page loaded
    $.ready();
    $.getScript("/js/allin.js");
    return false;
  });
};


// defined function for form submitting due to dynamic content
function superFancy(e) {
  e.preventDefault();
  let form = document.getElementById('main-form');
    try {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("main").innerHTML =
        this.responseText;
      }
      xhttp.open("POST", form.action, true);
      xhttp.send(new FormData(form));
    }
    catch (e) {
      console.log(e.message);
    }
    return false;
}

