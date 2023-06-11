// jquery load method for menu: 
$(function() {
    $("#menu > a").click(function(e) {
        e.preventDefault(); 
        pushHTML(this.href);
    });
});

// vanilla JS method for navbar: 
/*function loadpage(page) {
  e.preventDefault();
  pushHTML(page);
  return false;
};
*/
$(function() {
  $("#navbar > a").click(function(e) {
      e.preventDefault(); 
      pushHTML(this.href);
  });
});

// core function for loading page
function pushHTML(ref) {
  $("#main").load(ref, function() {
    //execute here after load completed
    return false;
  });
};

object.onsubmit = function(){superFancy(e)};

function superFancy(e) {
  e.preventDefault();
  try {
    $.ajax({ // create an AJAX call...
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
  return false;
}

$('#main-form').submit(function() { // catch the form's submit event
  $.ajax({ // create an AJAX call...
      data: $(this).serialize(), // get the form data
      type: $(this).attr('method'), // GET or POST
      url: $(this).attr('action'), // the file to call
      success: function(response) { // on success..
          $('#main').html(response); // update the DIV
      }
  });
  return false; // cancel original event to prevent form submitting
});