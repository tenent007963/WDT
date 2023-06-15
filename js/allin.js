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
    //load the 
    $.getScript("/js/fancy.js");
    return false;
  });
};
