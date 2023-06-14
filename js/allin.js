// jquery load method for menu & navbar: 
$(function() {
    $("#menu > a").click(function(e) {
        e.preventDefault(); 
        pushHTML(this.href);
        return false;
    });
});

$(function() {
  $("#navbar > a").click(function(e) {
      e.preventDefault(); 
      pushHTML(this.href);
      return false;
  });
});

// core function for loading page
function pushHTML(ref) {
  $("#main").load(ref, function() {
    //trigger listener after page loaded
    $.getScript("/js/allin.js");
    return false;
  });
};


// defined function for form submitting due to dynamic content
function superFancy(e) {
  e.preventDefault();
  let mein = document.getElementById('main-form');
  let sub = document.getElementById('search-form');
  let form = (sub != null ) ? sub : mein;
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
}

