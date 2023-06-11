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
    n
    return false;
  });
};


// defined function for form submitting due to dynamic content
function superFancy(e) {
  console.log("oops!");
 /* e.preventDefault();
  try {
    $(this).ajax({ // create an AJAX call...
      data: $(this).serialize(), // get the form data
      type: $(this).attr('method'), // GET or POST
      url: $(this).attr('action'), // the file to call
      success: function(response) { // on success..
          $('#main').html(response); // update the DIV
          //pushHTML(response);     // or try diff method
      }
  });
  } catch (e) {
    console.log(e.message);
  }
  return false;*/
}

$(document).on("load", function() {
  $(document).ready(function () {
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
  });
});