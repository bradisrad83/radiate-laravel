var dj = $("#djs");
var schedule = $("#schedule");
var public_blog = $("#public_blog");
var contact = $("#contact");


//function to slide all divs out of the main box
var hideDivs = function() {
    dj.fadeOut(1000);
    schedule.fadeOut(1000);
    public_blog.fadeOut(1000);
    contact.fadeOut(1000);
};










$(document).ready(function() {
    hideDivs();
    $(".djs").click(function() {
        hideDivs();
        dj.slideToggle(2000);
    });
    $(".schedule").click(function() {
        hideDivs();
        schedule.slideToggle(2000);
    });
    $(".public_blog").click(function() {
        hideDivs();
        public_blog.slideToggle(2000);
    });
    $(".contact").click(function() {
        hideDivs();
        contact.slideToggle(2000);
    });
});