//jquery load method: 
$(function() {
    $("#links > a").click(function(e) {
        e.preventDefault(); //so the browser doesn't follow the link

        $("#content").load(this.href, function() {
            //execute here after load completed
        });
    });
});