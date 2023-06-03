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