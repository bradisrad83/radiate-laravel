//global variables
//mainly just did a bunch of jquery stores so I don't have to call them each time.  
//making the code look much nicer
var dj = $("#djs");
var schedule = $("#schedule");
var public_blog = $("#public_blog");
var contact = $("#contact");
var sunday = $("#sunday");
var monday = $("#monday");
var tuesday = $("#tuesday");
var wednesday = $("#wednesday");
var thursday = $("#thursday");
var friday = $("#friday");
var saturday = $("#saturday");
var times = $("#times");

//function to slide all divs out of the main box
var hideDivs = function() {
    dj.fadeOut(1000);
    schedule.fadeOut(1000);
    public_blog.fadeOut(1000);
    contact.fadeOut(1000);
};
//function to slide all schedules out of the schedule dive on load and each time one is clicked so there is no overlapping
var hideSchedule = function() {
    monday.fadeOut(1000);
    tuesday.fadeOut(1000);
    wednesday.fadeOut(1000);
    thursday.fadeOut(1000);
    friday.fadeOut(1000);
    saturday.fadeOut(1000);
    sunday.fadeOut(1000);
}








$(document).ready(function() {
    //hide all divs initially unitl user interacts
    dj.hide();
    schedule.hide();
    public_blog.hide();
    contact.hide();
    sunday.hide();
    monday.hide();
    tuesday.hide();
    wednesday.hide();
    thursday.hide();
    friday.hide();
    saturday.hide();

    //click events for animation and div reveals
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
    $(".sunday").click(function() {
        hideSchedule();
        sunday.slideToggle(3000);
    });
    $(".monday").click(function() {
        hideSchedule();
        monday.slideToggle(3000);
    });
});