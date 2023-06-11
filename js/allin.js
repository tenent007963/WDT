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
  console.log("fuck!");
  e.preventDefault();
    try {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("main").innerHTML =
        this.responseText;
      }
      xhttp.open("GET", "ajax_info.txt");
      xhttp.send();
    }
    catch (e) {
      console.log(e.message);
    }
    return false;
}

$("main-form").submit(function (event) {
  console.log("Triggered!");
  event.preventDefault();
  try {
    $.ajax({
      data: $(this).serialize(), // get the form data
      type: $(this).attr('method'), // GET or POST
      url: $(this).attr('action'), // the file to call
      success: function(response) { // on success..
        $('#main').html(response); // update the DIV
        //pushHTML(response);     // or try diff method
      }
    }).done(function (data) {
      console.log(data);
    });
  }
  catch (e) {
    console.log(e.message);
  }
  return false;
});