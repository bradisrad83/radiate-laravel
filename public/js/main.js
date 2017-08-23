var dj = $("#djs");
var schedule = $("#schedule");
var public_blog = $("#public_blog");
var contact = $("#contact");


//function to slide all divs out of the main box
var hideDivs = function() {
    dj.slideToggle(100);
    schedule.slideToggle(100);
    public_blog.slideToggle(100);
    contact.slideToggle(100);
};









$(document).ready(function() {
    console.log("document onload ready function working");
    $(".djs").click(function() {
        console.log("DJS clicked");
        hideDivs();
        dj.slideToggle(1000);
    });
    $(".schedule").click(function() {
        console.log("Schedule clicked");
        hideDivs();
        schedule.slideToggle(1000);
    });
    $(".public_blog").click(function() {
        console.log("Public Blog clicked");
        hideDivs();
        public_blog.slideToggle(1000);
    });
    $(".contact").click(function() {
        console.log("Contact clicked");
        hideDivs();

    });
});