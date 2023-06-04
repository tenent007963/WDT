// jquery load method for menu: 
$(function() {
    $("#menu > a").click(function(e) {
        e.preventDefault(); 
        pushHTML(this.href);
    });
});

// vanilla JS method for navbar: 
function loadpage(page) {
  e.preventDefault();
  pushHTML(page);
};

// core function for loading page
function pushHTML(ref) {
  $("#main").load(ref, function() {
    //execute here after load completed
    return 1;
  });
};

$('#create').submit(function() { // catch the form's submit event
  $.ajax({ // create an AJAX call...
      data: $(this).serialize(), // get the form data
      type: $(this).attr('method'), // GET or POST
      url: $(this).attr('action'), // the file to call
      success: function(response) { // on success..
          $('#created').html(response); // update the DIV
      }
  });
  return false; // cancel original event to prevent form submitting
});